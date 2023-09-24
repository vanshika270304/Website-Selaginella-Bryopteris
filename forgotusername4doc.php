<html>

<head>
    <title>coustomer login</title>
    <link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="style.php">
</head>

<body>

<div class="headeraligned">
        <img src="logo.jpg" width="300" alt="">

        <span class="headerspan">SELAGINELLA BRYOPTERIS HOSPITAL</span>
    </div>

    <hr>
    <ul class=headerul>
        <li class="headerli"><a href="home.php">HOME</a></li>
        <li class="headerli"><a href="AboutUsfinal/AboutUs/about.php">ABOUT US</a></li>
        <li class="headerli"><a href="bookappoinment.php">BOOK APPOINTMENT</a></li>
        <li class="headerli"><a href="doctors.php">DOCTORS</a></li>
        <li class="headerli"><a href="www.google.com">GALLERY</a></li>
        <li class="headerli"><a href="contact.php">CONTACT US</a></li>
        <li class="headerli"><a href="emergency.php">EMERGENCY</a></li>
        <li class="headerli"><a href="loginchoose.php">LOGIN</a></li>
    </ul>

    <!-- main header end -->
    <div id="frm">
        <h1>Forgot Username</h1>
        <form name="f1"  method="POST">
            <p>
                <label> Email id: </label>
                <input type="text" id="emailid" name="emailid" />
            </p>
            <p>
                <label> Phone Number: </label>
                <input type="phone" id="phone" name="phone" />
            </p>
            <p>
                <input type="submit" id="btn" value="Check" />
            </p>
        </form>

        <span style="padding-right: 40%;"><a href="signup.php">New User?</a></span><span><a href="forgot.php">Forgot password?</a></span>
    </div>


    <?php
$emailid = $phone =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $emailid = test_input($_POST["emailid"]);
  $phone = test_input($_POST["phone"]);


  if ($emailid == "" && $phone == "") {
    echo '<script>alert("Email and Phone fields are empty");</script>';
    }
    else if ($emailid == "") {
        echo '<script>alert("Email is empty");</script>';
    }
else if ($phone == "") {
    echo '<script>alert("Phone field is empty");</script>';
    }
else 
    {
        include('login.php');
            $emailid = $_POST['emailid'];
            $phone = $_POST['phone'];



            $emailid = stripcslashes($emailid);
            $phone = stripcslashes($phone);
            $emailid = mysqli_real_escape_string($con , $emailid);
            $phone = mysqli_real_escape_string($con , $phone);


            $sql = "select * from loginfordoctor where emailid = '$emailid' and phone = '$phone'" ;
            $result = mysqli_query($con , $sql);
            $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);


            if($count == 1){  
                $row = mysqli_fetch_assoc($result);
                echo '<script>alert("Your User Name is:");</script>'.$row["username"];
            }  
            else{  
                echo '<script>alert("emailid or phone number invalid");</script>';
            }     
            }
        }
            

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
}

?>


    
</body>

</html>