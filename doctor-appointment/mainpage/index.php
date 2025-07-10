<html>
<head>
    <title>doctor appointment</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body >
    <header style="background-color: #d7f9fb;">
        <div class="navbar">
            <div>
			<div class="title">BOOK CONSULTATIONS</div><img class="logo" src="logo.jpg">
            </div>
            <nav>
                <ul>
                    <li><a class="active" href="#home"><i class="fa-solid fa-house"></i>Home</a></li>
                    <li><a href="..\DOCTOR APPOINTMENT SYSTEM\onlineconsultation.html"><i class="fa-solid fa-info-circle"></i>book online</a></li>
                    <li><a href="..\OFFLINE APPOINTMENT\offlinedoctorappointment\offlinedoctorappointment.html"><i class="fa-solid fa-info-circle"></i>book offline</a></li>
                    <li><a href="#services"><i class="fa-solid fa-briefcase-medical"></i>Services</a></li>
                    <li><a href="doc_sign_in.php"><i class="fa-solid fa-user-doctor"></i>Login(doctor)</a></li>
                    <li><a href="login_patient.php"><i class='fas fa-user-circle'></i>Login(patient)</a></li>
                    <li><a href="register.php"><i class='fas fa-user-circle'></i>Register(patient)</a></li>
                </ul>
            </nav>
        </div>
    </header><br>
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to <br>doctor consultations <br>at fingertips!</h1>
            <p>Best health, our priority.</p><br>
            <a href="#services" class="cta-button">Explore Our Services</a>
        </div>
    </section>
    <br><br><div class="whiteline"></div><br>
    <section id="about us">
        <div class="blue">
        <div class="about " ><br>
            <h2 class="ah2">ABOUT US</h2><br><br>
                <?php 
                $conn= mysqli_connect('localhost','root',"",'hospital_application');
                $q='select count(*) as c from booking_slots';
                $q1='select  COUNT(*) as c FROM offline_appointments';
                $r1=mysqli_query($conn,$q);
                $r2=mysqli_query($conn,$q1);
                $count1 = mysqli_fetch_assoc($r1)['c'];
                $count2 = mysqli_fetch_assoc($r2)['c'];
                $r=$count1+$count2;
                echo "<h3 class='ah4' ><i class='fas fa-calendar-check'></i>&emsp;Bookings completed: $r</h3>";   

                   ?><br><div style="font-family: Book Antiqua; color:rgb(18, 81, 144); width:50%; font-weight:bold; font-size: 18px;">
                   <br>At BOOK CONSULTATIONS we provide all patient comfort at fingertips. <br>If a person prefers to go to the hospital and get a prior appointment, they can
               do that using this website. Otherwise, if a person cannot visit the hospital, then they can freely procede with the online consultations.<br>
           If you forgot to purchase the medicines after getting a prescription, then you have an option to order it right from your home or wherever you maybe.<br>
       Sometimes, prior appointment helps save the waiting time, so you can book your labtests for the ofline mode and visit the hospital at the given time.<br>
   If you have to get small tests done (which maybe done at home CONDITIONS APPLY), you can get them done at home.</div></h3>
            <br><br><center>
            <iframe style="margin-left: 60%; margin-top: -450px;" width="590" height="330" src="https://www.youtube.com/embed/2jggu2RMD4w?si=0ivzzP1U3_tRdOiX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </center>
            <br><br>
        </div></div>
    </section>
    <div class="whiteline"></div>
    <section id="services"><section id="book"></section>
    
    <div class="blue"><br>
        <h1 class="ah2">SERVICES</h1><br><br><br>
        <div class="services-container">
            <div class="service" >
                <img src="book.png" alt="book appointment">
                <h3>BOOK APPOINTMENTS</h3>
                <p style="font-size: 20px;">Patients can book both online and offline consultaions.<br>select Doctors, departments and schedule timings<br>
            <a href="..\DOCTOR APPOINTMENT SYSTEM\onlineconsultation.html">Click to book Online Appointment</a><br>
            <a href="..\OFFLINE APPOINTMENT\offlinedoctorappointment\offlinedoctorappointment.html">Click to book Ofline Appointment</a></p>
                <br>
            </div>
            <div class="service">
                <img src="buy.jpg" alt="buy Medicines">
                <a href="medicines.html"><h3>BUY MEDICINES</h3></a>
                <p style="font-size: 20px;">Order medicines online. <br>Just get consultation <br>then order your medicines<br> using the prescription ID.</p>
            </div> 
            <div class="service">
                <img src="labtest.jpg" alt="get labtest ">
                <h3> BOOK LAB TEST</h3></a>
                <p style="font-size: 20px;">Get an experienced lab technician at your home and get your blood tests done in your comfort zone! <br>
                <a href="..\Doctor Project\labtest.php">Click here to Book LabTest at home </a><br>
                <a href="..\OFFLINE APPOINTMENT\labtestathospital\labhospital.html">Click here to Book Labtest at hospital</p>
            </div>           
        </div>
    </div>
    </section><br><br><br><br><br>

    
    <div class="sidebar">
        <a href="https://wa.me/+918499099949"><i class="fa-brands fa-whatsapp" style="color:green; font-size: 25px;"></i></a>
        <a href="Tel: +918465061466"><i class="fa-solid fa-phone"style="font-size:25px;color:black;"></i></a>
        <a href="#book"><i class="fa-solid fa-calendar-check" style="font-size:25px;color:salmon;"></i></a>
    </div>
</body>
</html>
