<?php
$patient_name = $_GET['name'] ?? '';
$gender = $_GET['gender'] ?? '';
$age = $_GET['age'] ?? '';
$blood_group = $_GET['blood_group'] ?? '';
$conn = mysqli_connect("localhost", "root", "", "hospital_application");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<html>
<head>
  <title>Patient Dashboard</title>
  <link href="patient.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <div class="a">
    <i class="bi bi-person-circle"></i> <span><strong>Name:-</strong>  <?php echo $patient_name; ?></span>&emsp;&emsp;
    <i class="bi bi-gender-female"></i> <span><strong>Gender:-</strong>  <?php echo $gender; ?></span>&emsp;&emsp;
    <i class="bi bi-hourglass-split"></i><span><strong>Age:-</strong>  <?php echo $age; ?> yrs</span>&emsp;&emsp;
    <i class="bi bi-droplet-half"></i><span><strong>Blood Group:-</strong>  <?php echo $blood_group; ?></span>
  </div>
  <div class="appointments">
    <div class="b">
      <div class="icon"><i class="bi bi-capsule"></i></div>
      <h2>Past Online Appointments</h2>
      <p>Recent visits</p>
      <table>
        <?php
        $bp = "SELECT * FROM booking_slots WHERE p_name='$patient_name' AND created_at < NOW() - INTERVAL 1 DAY";
        $b = mysqli_query($conn, $bp);
        if (mysqli_num_rows($b) > 0) {
            while ($x = mysqli_fetch_assoc($b)) {
                $date = date("Y-m-d", strtotime($x['created_at']));
                echo "<tr><td>$date</td><td>{$x['doctor_name']}</td><td>{$x['session']}</td><td>{$x['slot_time']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No past online appointments found.</td></tr>";
        }
        ?>
      </table>
    </div>

    <div class="c">
      <div class="icon2"><i class="bi bi-droplet-half"></i></div>
      <h2>Past Offline Appointments</h2>
      <p>Recent visits</p>
      <table>
        <?php
        $of = "SELECT * FROM offline_appointments WHERE patient_name='$patient_name' AND appointment_date < NOW() - INTERVAL 1 DAY";
        $o = mysqli_query($conn, $of);
        if (mysqli_num_rows($o) > 0) {
            while ($y = mysqli_fetch_assoc($o)) {
                echo "<tr><td>{$y['appointment_date']}</td><td>{$y['doctor']}</td><td>{$y['slot']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No offline appointments found.</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>
  <div class="container">
    <h2 class="h3">Doctor Visits</h2>
    <table>
        <tr>
          <th>Doctor</th>
          <th>Date</th>
          <th>Department</th>
          <th>Reports</th>
        </tr>
        <?php
        $dr = "SELECT * FROM offline_appointments WHERE patient_name='$patient_name' AND appointment_date < NOW() - INTERVAL 1 DAY";
        $r = mysqli_query($conn, $dr);
        if (mysqli_num_rows($r) > 0) {
            while ($doc = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>{$doc['doctor']}</td>
                    <td>{$doc['appointment_date']}</td>
                    <td>{$doc['department']}</td>
                    <td>
                      <a href='report1.pdf' target='_blank' class='view-btn'>View</a>
                      <a href='report1.pdf' download class='download-btn'>Download</a>
                    </td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No past doctor visits found.</td></tr>";
        }
        ?>
    </table>
  </div>
</body>
</html>
