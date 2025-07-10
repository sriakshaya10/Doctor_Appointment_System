<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rate Your Doctor</title>
  <style>
    body {
      background-color: #E6F0FA;
      font-family: "Bookman Old Style";
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .rating-form {
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      width: 400px;
      text-align: center;
    }
    .rating-form h2 {
      color: #003366;
      margin-bottom: 20px;
    }
    .stars {
      display: inline-flex;
      flex-direction: row-reverse;
      justify-content: center;
      gap: 10px;
      margin-bottom: 20px;
    }
    .stars input {
      display: none;
    }
    .stars label {
      font-size: 30px;
      color: #ccc;
      cursor: pointer;
    }
    .stars input:checked ~ label,
    .stars label:hover,
    .stars label:hover ~ label {
      color: #FFD700;
    }
    textarea {
      width: 100%;
      height: 80px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
      padding: 10px;
      font-size: 14px;
      resize: none;
    }
    button {
      background-color: #003366;
      color: #FFFFFF;
      border: none;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #00509E;
    }
  </style>
  <script>
    window.onload = function () {
      const docName = localStorage.getItem("selectedDoctor") || "Dr. Example";
      document.getElementById("doctor_name_field").value = docName;
      document.getElementById("doctor_title").innerText = docName;
    }
  </script>
</head>
<body>
<?php
$message = ''; 
$conn = mysqli_connect('localhost', 'root', '', 'hospital_application');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$doctor_name = isset($_POST['doctor_name']) ? $_POST['doctor_name'] : 'Unknown';
$rating = 0;
$feedback = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $feedback = isset($_POST['feedback']) ? mysqli_real_escape_string($conn, $_POST['feedback']) : '';
if ($rating >= 1 && $rating <= 5) {
    $sql = "INSERT INTO doctor_ratings (doctor_name, rating, feedback) VALUES ('$doctor_name', $rating, '$feedback')";
if (mysqli_query($conn, $sql)) {
      $message = "<h2 style='color:green;'>Thank you for rating $doctor_name!</h2>";
      echo "<script>
          setTimeout(function() {
                      window.location.href = 'onlineconsultation.html';
                  }, 3000);
            </script>";
} else {
      $message = "Error: " . mysqli_error($conn);
    }
} else {
      $message = "<h2 style='color:red;'>Please give a valid rating between 1 and 5.</h2>";
    }
}
mysqli_close($conn);
?>
  <div class="rating-form">
    <h2>Rate <span id="doctor_title">Your Doctor</span></h2>
    <?php echo $message; ?>
    <form method="POST" action="">
      <input type="hidden" name="doctor_name" id="doctor_name_field">
      <div class="stars">
        <input type="radio" name="rating" id="star1" value="1">
        <label for="star1">&#9733;</label>
        <input type="radio" name="rating" id="star2" value="2">
        <label for="star2">&#9733;</label>
        <input type="radio" name="rating" id="star3" value="3">
        <label for="star3">&#9733;</label>
        <input type="radio" name="rating" id="star4" value="4">
        <label for="star4">&#9733;</label>
        <input type="radio" name="rating" id="star5" value="5">
        <label for="star5">&#9733;</label>
      </div>
      <textarea name="feedback" placeholder="Write your feedback.."></textarea>
      <button type="submit">Submit Rating</button>
    </form>
  </div>
 
</body>
</html>
