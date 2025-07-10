<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital_application"; 
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$patient_name = $_POST['patient_name'];
$test_type = $_POST['test_type'];
$hospital = $_POST['hospital'];
$test_date = $_POST['test_date'];
$check_sql = "SELECT * FROM hospital_labbookings 
              WHERE patient_name = '$patient_name' 
              AND test_type = '$test_type' 
              AND hospital = '$hospital' 
              AND date = '$test_date'";
$result = $conn->query($check_sql);
if ($result->num_rows > 0) {
    echo "<script>
            alert('This booking already exists. Please enter different details.');
            window.history.back();
          </script>";
} else {
    $sql = "INSERT INTO hospital_labbookings(patient_name, test_type, hospital, date)
            VALUES ('$patient_name', '$test_type', '$hospital', '$test_date')";
    if ($conn->query($sql) === TRUE) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Booking Confirmation</title>
            <style>
                body {
                    margin: 0;
                    font-family: Arial, sans-serif;
                    background-image: url('https://bytesflow.com/wp-content/uploads/2018/06/Image-3.png');
                    background-size: cover;
                    background-attachment: fixed;
                    background-repeat: no-repeat;
                    text-align: center;
                    color: #333;
                }
                .confirmation-box {
                    background: rgba(255, 255, 255, 0.95);
                    padding: 40px;
                    border-radius: 15px;
                    box-shadow: 0 0 20px rgba(0,0,0,0.3);
                    max-width: 500px;
                    margin: 80px auto;
                }
                h2 {
                    color: green;
                }
                .btn {
                    background-color: #007BFF;
                    color: white;
                    padding: 10px 25px;
                    margin-top: 20px;
                    border: none;
                    border-radius: 8px;
                    cursor: pointer;
                    font-size: 16px;
                }
                .btn:hover {
                    background-color: #0056b3;
                }
                p {
                    margin: 10px 0;
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class='confirmation-box'>
                <h2>✅ Booking Confirmed!</h2>
                <p><strong>Patient:</strong> $patient_name</p>
                <p><strong>Test:</strong> $test_type</p>
                <p><strong>Hospital:</strong> $hospital</p>
                <p><strong>Date:</strong> $test_date</p>
                <form action='labhospital.html'>
                    <button class='btn'>🏠 Go to Home</button>
                </form>
            </div>
        </body>
        </html>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
