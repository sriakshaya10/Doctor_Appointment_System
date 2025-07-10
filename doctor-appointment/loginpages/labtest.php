<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect('localhost', 'root', '', 'hospital_application');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $testname = mysqli_real_escape_string($conn, $_POST['testname']);
    $testprice = floatval($_POST['testprice']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $sql = "INSERT INTO home_lab_bookings (fullname, contact, testname, testprice, date, time, address)
            VALUES ('$fullname', '$contact', '$testname', '$testprice', '$date', '$time', '$address')";
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
    mysqli_close($conn);
}
if (isset($_GET['success']) && $_GET['success'] == '1') {
    echo "<script>alert('Lab Test Booked Successfully!');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab Test at Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="labtest.css">
</head>
<body>
    <div class="container">
        <h2>Book a Lab Test at Home</h2>
        <p>Get your medical tests done at the comfort of your home.</p>
        <form id="labTestForm" method="POST" action="">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="fullname" required>
                <small class="error-message" id="nameError"></small>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="tel" id="contact" name="contact" required>
                <small class="error-message" id="contactError"></small>
            </div>
            <div class="form-group">
                <label for="testType">Select Test:</label>
                <select id="testType" name="testname" required>
                    <option value="">-- Select Test --</option>
                    <option value="Blood Test" data-price="30.00">Blood Test - $30</option>
                    <option value="Pregnancy Blood Test" data-price="80.00">Pregnancy Blood Test - $80</option>
                    <option value="Cholesterol Test" data-price="40.00">Cholesterol Test - $40</option>
                    <option value="Diabetes Test" data-price="50.00">Diabetes Test - $50</option>
                    <option value="Vaccines" data-price="90.00">Vaccines - $90</option>
                </select>
                <small class="error-message" id="testTypeError"></small>
            </div>
            <div class="form-group">
                <label for="price">Test Price:</label>
                <input type="text" id="price" name="testprice" readonly>
            </div>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>
                <small class="error-message" id="dateError"></small>
            </div>
            <div class="form-group">
                <label for="time">Select Time:</label>
                <input type="time" id="time" name="time" required>
                <small class="error-message" id="timeError"></small>
            </div>
            <div class="form-group">
                <label for="address">Home Address:</label>
                <input type="text" id="address" name="address" required>
                <small class="error-message" id="addressError"></small>
            </div>
            <button type="submit">Book Now</button>
        </form>
    </div>
    <script>
        document.getElementById('testType').addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            const price = selected.getAttribute('data-price');
            document.getElementById('price').value = price ? price : '';
        });
        document.getElementById('labTestForm').addEventListener('submit', function (event) {
            let valid = true;
            document.querySelectorAll('.error-message').forEach(el => el.innerText = '');
            let name = document.getElementById('name').value.trim();
            if (!/^[a-zA-Z.\s]+$/.test(name)) {
                document.getElementById('nameError').innerText = "* Enter a valid name (letters only)";
                valid = false;
            }
            let contact = document.getElementById('contact').value.trim();
            if (!/^\d{10}$/.test(contact)) {
                document.getElementById('contactError').innerText = "* Enter a valid 10-digit number";
                valid = false;
            }
            let testType = document.getElementById('testType').value;
            if (!testType) {
                document.getElementById('testTypeError').innerText = "* Please select a test";
                valid = false;
            }
            let date = document.getElementById('date').value;
            if (!date) {
                document.getElementById('dateError').innerText = "* Select a date";
                valid = false;
            }
            let time = document.getElementById('time').value;
            if (!time) {
                document.getElementById('timeError').innerText = "* Select a time";
                valid = false;
            }
            let address = document.getElementById('address').value.trim();
            if (!address) {
                document.getElementById('addressError').innerText = "* Enter your address";
                valid = false;
            }
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
