<?php
$conn = new mysqli('localhost', 'root', '', 'hospital_application');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$appointmentID = isset($_GET['appointmentID']) ? $_GET['appointmentID'] : null;
$appointmentDate = isset($_GET['appointmentDate']) ? $_GET['appointmentDate'] : null;

if ($appointmentID && $appointmentDate) {
    $sql = "SELECT * FROM prescriptions WHERE appointmentID = '$appointmentID' AND appointment_date = '$appointmentDate'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $prescription = $result->fetch_assoc();
        $medicines = explode(',', $prescription['medicines']);

        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<title>Prescription Details</title>';
        echo '<link rel="stylesheet" href="medicines.css">';
        echo '<script>
            function confirmOrder() {
                alert("Order Confirmed");
                window.location.href = "index.php";
            }
        </script>
        <style>
            body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.medicine-list {
    width: 50%;
    margin: 50px auto; 
    padding: 20px;
    background-color: #fff; 
    border: 1px solid #ddd; 
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    text-align: left;
}

h2 {
    text-align: center;
    color: #333;
}

h3 {
    margin-top: 20px;
    color: #333;
}

ul#medicinesList {
    list-style-type: none;
    padding: 0;
}

ul#medicinesList li {
    margin-bottom: 10px;
}

button {
    background-color: #4CAF50; /* Green background */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: 20px auto;
}

button:hover {
    background-color: #45a049; /* Slightly darker green on hover */
}
</style>';
        echo '</head>';
        echo '<body>';
        echo '<section class="medicine-list" id="medicineList" style="display: block; text-align: center;" align="center">';
        echo '<h2>Prescription Details</h2>';
        echo '<p><strong>Prescription Number:</strong> <span id="outPrescriptionNo">' . $prescription['id'] . '</span></p>';
        echo '<p><strong>Patient Name:</strong> <span id="outPatientName">' . htmlspecialchars($prescription['patient_name']) . '</span></p>';
        echo '<p><strong>Doctor Name:</strong> <span id="outDoctorName">' . htmlspecialchars($prescription['doctor_name']) . '</span></p>';
        echo '<p><strong>Prescription Date:</strong> <span id="outPrescriptionDate">' . $prescription['appointment_date'] . '</span></p>';
        echo '<h3>Medicines</h3>';
        echo '<ul id="medicinesList">';
        foreach ($medicines as $medicine) {
            echo '<li><input type="checkbox" checked> ' . htmlspecialchars(trim($medicine)) . '</li>';
        }
        echo '</ul>';
        echo '<h3>Dosage</h3>' . htmlspecialchars($prescription['instructions']);
        echo '<br><button id="confirmOrder" onclick="confirmOrder()">Confirm Order</button>';
        echo '</section>';
        echo '</body>';
        echo '</html>';
    } else {
        echo '<script> alert("No prescription available for entered details");window.location.href = "index.php";</script>';
    }
} else {
    echo '<script> alert("Appointment ID or Prescription Date missing in the request.");window.location.href = "medicines.html";</script>';
}

$conn->close();
?>
