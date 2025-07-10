<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $conn = mysqli_connect("localhost", "root", "", "hospital_application");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to check the user's credentials
    $q = "SELECT * FROM patient WHERE patient_name='$name' AND password='$password'";
    $res = mysqli_query($conn, $q);

    if (mysqli_num_rows($res) > 0) {
        // If credentials are valid, fetch user data
        $data = mysqli_fetch_assoc($res);
        $patient_name = urlencode($data['patient_name']);
        $gender = urlencode($data['gender']);
        $age = urlencode($data['age']);
        $blood_group = urlencode($data['blood_group']);
        
        //<-- Redirect to patient.php with the patient's details passed as URL parameters
        header("Location: ..\Doctor project\patient.php?name=$patient_name&gender=$gender&age=$age&blood_group=$blood_group");
        exit();
    } else {
        echo "<script>alert('Invalid Login Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Patient Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 300px;
      text-align: center;
    }
    .card h2 {
      color: #007BFF;
      margin-bottom: 20px;
    }
    .input-field {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .btn {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Patient Login</h2>
    <form method="post">
      <input type="text" id="name" name="name" class="input-field" placeholder="Enter your name" required>
      <input type="password" name="password" id="password" class="input-field" placeholder="Enter your password" required>
      <button class="btn" type="submit">Sign In</button>
    </form>
  </div>
</body>
</html>
