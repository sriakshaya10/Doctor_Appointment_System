<?php
session_start();

$appointment = $_SESSION['appointment'];
$name = $_POST['name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$date = $_POST['date'];

$host = "localhost";
$user = "root";
$password = "";
$dbname = "hospital_application";
$conn = new mysqli($host, $user, $password, $dbname,);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO  offline_appointments(location, hospital, department, doctor, slot, patient_name, age, phone, appointment_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssiss", $appointment['location'], $appointment['hospital'], $appointment['department'],
    $appointment['doctor'], $appointment['slot'], $name, $age, $phone, $date);

$stmt->execute();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Appointment Confirmation</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h2>Appointment Confirmed!</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Age:</strong> <?= htmlspecialchars($age) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($phone) ?></p>
    <p><strong>Location:</strong> <?= $appointment['location'] ?></p>
    <p><strong>Hospital:</strong> <?= $appointment['hospital'] ?></p>
    <p><strong>Department:</strong> <?= $appointment['department'] ?></p>
    <p><strong>Doctor:</strong> <?= $appointment['doctor'] ?></p>
    <p><strong>Slot:</strong> <?= $appointment['slot'] ?></p>
    <p><strong>Date:</strong> <?= htmlspecialchars($date) ?></p>
  </div>
</body>
</html>
