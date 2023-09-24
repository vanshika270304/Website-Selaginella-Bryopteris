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
        <h1>Forgot Password</h1>
        <form name="f1"  method="POST">
            <p>
                <label> User Name: </label>
                <input type="text" id="user" name="user" />
            </p>
            <p>
                <label> Phone Number: </label>
                <input type="phone" id="phone" name="phone" />
            </p>
            <p>
                <label> Password: </label>
                <input type="password" id="password" name="password" />
            </p>
            <p>
                <label> Confirm Password: </label>
                <input type="password" id="password2" name="password2" />
            </p>
            <p>
                <input type="submit" id="btn" value="Check" />
            </p>
        </form>

        <span style="padding-right: 40%;"><a href="signup.php">New User?</a></span><span><a href="forgotusername.php">Forgot username?</a></span>
    </div>


    <?php
$user = $phone =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = test_input($_POST["user"]);
  $phone = test_input($_POST["phone"]);
  $password = test_input($_POST["password"]);
  $password2 = test_input($_POST["password2"]);


  if ($user == "" && $phone == "") {
    echo '<script>alert("User Name and Phone fields are empty");</script>';
    }
    else if ($user == "") {
        echo '<script>alert("User Name is empty");</script>';
    }
else if ($phone == "") {
    echo '<script>alert("Phone field is empty");</script>';
    }
    else if (!$password == $password2) {
        echo '<script>alert("Passwords does not match");</script>';
        }
else 
    {
        include('login.php');
            $username = $_POST['user'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];



            $username = stripcslashes($username);
            $phone = stripcslashes($phone);
            $username = mysqli_real_escape_string($con , $username);
            $phone = mysqli_real_escape_string($con , $phone);


            $sql = "select * from loginfordoctor where username = '$username' and phone = '$phone'" ;
            $result = mysqli_query($con , $sql);
            $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);


            if($count == 1){  
                $query = "update loginfordoctor set password as '$password';";

                if (mysqli_query($con, $query)) 
                {
                    echo '<script>alert("Insertion succesful!");</script>';                    
                } 
                else 
                {
                    echo '<script>alert("Insertion Failed");</script>';
                }
                mysqli_close($con);
            }  
            else{  
                echo '<script>alert("Username or phone number invalid");</script>';
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