<?php
session_start();

$_SESSION['appointment'] = [
    'location' => $_POST['location'],
    'hospital' => $_POST['hospital'],
    'department' => $_POST['department'],
    'doctor' => $_POST['doctor'],
    'slot' => $_POST['slot']
];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient Info</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h2>Enter Patient Details</h2>
    <form action="confirm.php" method="post">
      <label for="name">Patient Name:</label>
      <input type="text" name="name" required>

      <label for="age">Age:</label>
      <input type="number" name="age" required>

      <label for="phone">Phone:</label>
      <input type="text" name="phone" required>

      <label for="date">Appointment Date:</label>
      <input type="date" name="date" required>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
