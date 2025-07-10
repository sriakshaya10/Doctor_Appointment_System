<?php
$doc_name = isset($_GET['name']) ? $_GET['name'] : 'Not Provided';
$profession = isset($_GET['profession']) ? $_GET['profession'] : 'Not Provided';
$experience = isset($_GET['experience']) ? $_GET['experience'] : 'Not Provided';

$conn = mysqli_connect('localhost', 'root', '', 'hospital_application');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Online & Offline Appointments
$query_online = "SELECT COUNT(*) AS online_count FROM booking_slots WHERE doctor_name = '$doc_name'";
$query_offline = "SELECT COUNT(*) AS offline_count FROM offline_appointments WHERE doctor = '$doc_name'";

$result_online = mysqli_query($conn, $query_online);
$result_offline = mysqli_query($conn, $query_offline);

$online_count = 0;
$offline_count = 0;

if ($result_online && mysqli_num_rows($result_online) > 0) {
    $row_online = mysqli_fetch_assoc($result_online);
    $online_count = $row_online['online_count'];
}
if ($result_offline && mysqli_num_rows($result_offline) > 0) {
    $row_offline = mysqli_fetch_assoc($result_offline);
    $offline_count = $row_offline['offline_count'];
}

$total_appointments = $online_count + $offline_count;
$earning = $total_appointments * 300;

// Rating Calculation
$online_rating_query = "SELECT AVG(rating) AS avg_rating FROM doctor_ratings WHERE doctor_name = '$doc_name'";
$online_rating_result = mysqli_query($conn, $online_rating_query);
$avg_online_rating = 0;

if ($online_rating_result && mysqli_num_rows($online_rating_result) > 0) {
    $row_rating = mysqli_fetch_assoc($online_rating_result);
    $avg_online_rating = round(floatval($row_rating['avg_rating']), 1);
}

$offline_rating = 4;
$total_rating_score = ($avg_online_rating * $online_count) + ($offline_rating * $offline_count);
$average_combined_rating = $total_appointments > 0 ? round($total_rating_score / $total_appointments, 1) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Doctor Page</title>
  <link href="doctor.css" rel="stylesheet" />
</head>
<body>
  <div class="h1">
    <h2>WELCOME TO YOUR PROFILE</h2>
    <h3><strong>Name:&nbsp;</strong><?php echo htmlspecialchars($doc_name); ?></h3>
    <p><strong>Profession:&nbsp;</strong><?php echo htmlspecialchars($profession); ?></p>
    <p><strong>Experience:&nbsp;</strong><?php echo htmlspecialchars($experience); ?></p>
    
  </div><br><br>

  <!-- Total Patients -->
  <div class="h2">
    <br><br>
    <p><?php echo $total_appointments; ?></p><br><br>
    <p>Patients</p>
    <span class="span">&emsp;<?php echo $total_appointments > 5 ? 'High' : 'Low'; ?></span>
  </div>

  <!-- Earnings -->
  <div class="h3">
    <img class="image2" src="earnings.jpg" alt="Earnings Image" /><br><br>
    <p>₹<?php echo number_format($earning); ?></p><br><br>
    <p>Earnings</p>
    <span class="span">&emsp;<?php echo $earning > 1500 ? 'High' : 'Low'; ?></span>
  </div>

  <!-- Rating -->
  <div class="h4">
    Rating<br><br>
    <p><?php echo $average_combined_rating; ?> / 5</p><br><br>
    <p>Average Rating</p>
    <span class="span">&emsp;<?php echo $average_combined_rating >= 4 ? 'Excellent' : ($average_combined_rating >= 3 ? 'Good' : 'Needs Improvement'); ?></span>
  </div><br><br>

  

  <!-- Appointments -->
  <div class="h5">
    <p><b>Upcoming Appointments</b></p>
    <fieldset>
      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'hospital_application');
        $query = "SELECT * FROM booking_slots WHERE doctor_name = '$doc_name' 
          AND TIMESTAMP(DATE(created_at), slot_time) > NOW()  - INTERVAL 1 DAY ORDER BY TIMESTAMP(DATE(created_at), slot_time) ASC";
        $result = mysqli_query($conn, $query);
        $q="SELECT * FROM offline_appointments WHERE doctor = '$doc_name' 
          AND appointment_date > CURDATE()  - INTERVAL 1 DAY
            OR (appointment_date = CURDATE() AND slot > CURTIME()) ORDER BY appointment_date ASC, slot ASC";
        $rhos = mysqli_query($conn, $q);
        if (mysqli_num_rows($rhos) > 0){
          echo '<fieldset>';
          while ($row = mysqli_fetch_assoc($rhos)) {
        echo '<div class="abc">📅 Upcoming Offline Appointment on ' . $row['appointment_date'] . 
             ' at ' . $row['slot'] .  '.</div><br>';
        
    }
          echo '</fieldset>';
        } else{
          echo "<p>No upcoming offline appointments.</p>";
        }
        $ronline = mysqli_query($conn, $query);
        if (mysqli_num_rows($ronline) > 0) {
          echo '<fieldset>';
          while ($row = mysqli_fetch_assoc($ronline)) {
              echo '<div class="abc">📅 Upcoming Online Appointment  on ' . date("Y-m-d", strtotime($row['created_at'])) .
                   ' during ' . $row['session'] . ' at ' . $row['slot_time']  . '</div><br></fieldset>';
              
          }
          echo '</fieldset>';
      } else {
          echo "<p>No upcoming online appointments.</p>";
      }
      ?>

    </fieldset>
  </div>


</body>
</html>
<?php mysqli_close($conn); ?>
