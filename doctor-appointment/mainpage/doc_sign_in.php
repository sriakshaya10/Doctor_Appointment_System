<!DOCTYPE html>
<html>
<head>
    <title>Doctor Sign In</title>
    <link rel="stylesheet" href="doc_sign_in.css">
    <script src="doc_sign_in.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Doctor Login</h2>
            <form onsubmit="return validateform();" method="post" >
                <input type="text" id="doctorName" name="docname" placeholder="Name" required>
                <p id="nameerror" style="color: red;"></p>
                <input type="password" id="doctorPassword" name="pswd" placeholder="Password" required>
                <p id="passworderror" style="color: red;"></p>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="image-container">
            <img src="doc_sign_in.jpg" alt="Doctor">
        </div>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name=$_POST['docname'];
        $password=$_POST['pswd'];
        $conn=mysqli_connect('localhost','root','','hospital_application');
        if(!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM doctordetails WHERE name = '$name' AND password = '$password'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_assoc($result);
            $doc_name = $row['name'];
            $profession = $row['profession'];
            $experience = $row['experience'];
            $image_url = "DOCTOR APPOINTMENT SYSTEM/images/" . $row['image']; 
            header("Location: ..\Doctor project\doctor.php?name=" . urlencode($doc_name) . "&profession=" . urlencode($profession) . "&experience=" . urlencode($experience) . "&image=" . urlencode($image_url));
             exit();
        } else {
            echo "<script>alert('Invalid name or password');</script>";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>