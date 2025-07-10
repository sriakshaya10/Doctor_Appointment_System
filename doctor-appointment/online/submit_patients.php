<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="8;url=onlineconsultation.html">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            background-color: #F0FAF8;
            padding-top: 50px;
        }
        .message {
            margin-top: 90px;
            background-color: #e0ffe0;
            display: inline-block;
            padding: 20px;
            border-radius: 10px;
            color: #1A4F7A;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect('localhost', 'root', '', 'hospital_application');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $session = $_POST['session'];
    $slot_time = $_POST['slot'];
    $doctor = $_POST['doctor'];
    $department = $_POST['department'];
    $created_at = date("Y-m-d H:i:s");
    $check_sql = "SELECT * FROM booking_slots WHERE doctor_name = '$doctor' AND slot_time = '$slot_time' AND p_name = '$name' AND p_age = '$age' AND DATE(created_at) = CURDATE()";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<div class='error'>You have already booked an appointment with this doctor for today at this time. 
              Please select a different time slot.</div>";
    } else {
        $duplicate_check_sql = "SELECT * FROM booking_slots WHERE doctor_name = '$doctor' AND slot_time = '$slot_time'  AND DATE(created_at) = CURDATE()";
        $duplicate_check_result = mysqli_query($conn, $duplicate_check_sql);
        if (mysqli_num_rows($duplicate_check_result) > 0) {
            echo "<div class='error'>This time slot is already booked by another user. Please choose a different time slot.</div>";
        } else {
            $sql = "INSERT INTO booking_slots (p_name, p_age, session, slot_time, doctor_name, department, created_at) VALUES ('$name', '$age', '$session', '$slot_time', '$doctor', '$department', '$created_at')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='message'>
                        <h2>Booking Confirmed!</h2>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Age:</strong> $age</p>
                        <p><strong>Session:</strong> $session</p>
                        <p><strong>Slot:</strong> $slot_time</p>
                        <p><strong>Doctor:</strong> $doctor</p>
                        <p><strong>Department:</strong> $department</p>
                      </div>";
                echo "<p style='color:#1A4F7A; font-size:18px; font-weight:bold;'>Redirecting to the home page...</p>";
            } else {
                echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
    }
    mysqli_close($conn);
}
?>
</body>
</html>
