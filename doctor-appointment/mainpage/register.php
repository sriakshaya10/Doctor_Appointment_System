<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $conn=mysqli_connect("localhost","root","","hospital_application");
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $language = $_POST['language']; 
        $password = $_POST['password'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $blood = $_POST['blood'];
        $query = "INSERT INTO patient (patient_name, email, phone, language, password, gender, age,blood_group) VALUES ('$name', '$email', '$phone', '$language', '$password','$gender','$age','$blood')";
        $r=mysqli_query($conn,$query);
        if ($r) {
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }

        mysqli_close($conn);

    }
    ?>
<html>
<head>
    <title>Patient Registration</title>
    <link rel="stylesheet" href="sign_in.css">
    <script ></script>
</head>
<body>
    <div class="login-container">
        <div class="image-container">
            <img src="patient.png" alt="Patient" class="login-image">
        </div>
        <h2>Patient Registration</h2>
        <form  method="post"onsubmit="return register()">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <label for="phone">Phone No:</label>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
            <label for="language">Preferred Language:</label>
            <select id="language" name="language">
                <option>English</option>
                <option>Hindi</option>
                <option>Telugu</option>
                <option>Kannada</option>
                <option>Tamil</option>
            </select>
            <label for="gender">Select Gender:</label>
            <select id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
            <label for="age">Enter Age:</label>
            <input type="number" id="age" name="age" placeholder="Age">
            <label for="blood">Blood Group:</label>
            <select id="blood" name="blood" required>
                <option value="">Select Blood Group</option>
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option>O+</option>
                <option>O-</option>
            </select>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <label for="confirm">Confirm Password:</label>
            <input type="text" id="confirm" placeholder="Confirm password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <script >
        function register(){
            var n=document.getElementById("name").value;
            var e=document.getElementById("email").value;
            var ph=document.getElementById("phone").value;
            var lang=document.getElementById("language").value;
            var pswd=document.getElementById("password").value;
            var confirm=document.getElementById("confirm").value;
            var age=document.getElementById('age').value;
            var blood = document.getElementById("blood").value;
            if (!/^[A-Za-z.\s]+$/.test(n)){
                alert("Name shoud have only letters, dots and spaces!!");
                return false;        }
            if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]{2,8}(\.[a-zA-Z]{2,8})?$/.test(e)) {
                alert("Email should be like abc@xyz.com or abc@xyz.edu.xy");
                return false;
            }
            if(!/^[0-9]{10,15}$/.test(ph)){
                alert("Incorrect mobile number entered, phone number should have min. 10 digits");
                return false;
            }
            if(!/^[A-Za-z0-9@#&*$]{8,10}$/.test(pswd)){
                alert("Password should have digits, alphabets, '#@$&*$' and should have min 8 characters");
                return false;
            }
            if(confirm !== pswd){
                alert("Password and confirm password not matching");
                return false;
            }
            if(age<0 && age>150){
                alert("Invalid age entered.");
                return false;
            }
            if (blood === "") {
                alert("Please select your blood group.");
                return false;
            }
            alert("Registration Successful"); 
            return true;
            }
    </script>
</body>
</html>