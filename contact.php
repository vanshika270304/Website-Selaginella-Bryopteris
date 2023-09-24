<?php

include("connection.php");


$query = "CREATE TABLE IF NOT EXISTS contactus (
    name VARCHAR(50) NOT NULL,
    email VARCHAR(70) NOT NULL,
    subject varchar(40),
    message varchar(100) NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
    die("Failed to create table: " . mysqli_error($connection));
}


if (isset($_POST['submit'])) 
{
    
    $name = mysqli_real_escape_string($connection, $_POST['form-name']);
    $mail = mysqli_real_escape_string($connection, $_POST['form-email']);
    $subject= mysqli_real_escape_string($connection, $_POST['form-Subject']);
    $message = mysqli_real_escape_string($connection, $_POST['form-text']);
  
    $query = "INSERT INTO contactus (name	,email,subject,message) VALUES ('$name', '$mail', '$subject','$message')";

    $result = mysqli_query($connection, $query);

    

    // Check for errors executing the query
    if (!$result) {
        die("Failed to insert record: " . mysqli_error($connection));
    }
    else
    {
        header("Location: alert3.html");
    }

    // header("Location: mail.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    

    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
rel="stylesheet"
/>

<link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="contact.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link href="contact.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
   
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
        <li class="headerli"><a href="gallery.php">GALLERY</a></li>
        <li class="headerli"><a href="contact.php">CONTACT US</a></li>
        <li class="headerli"><a href="emergency.php">EMERGENCY</a></li>
        <li class="headerli"><a href="loginchoose.php">LOGIN</a></li>
    </ul>

<!-- main header end -->
    
<div class="bgcl" style=" background-color:rgba(60, 179, 114, 0.212);">
    <div class="container mt-5">

 
        <!--Section: Content-->
        <section class="dark-grey-text mb-5">
          
          <style>
            .map-container-section {
              overflow:hidden;
              padding-bottom:56.25%;
              position:relative;
              height:0;
            }
            .map-container-section iframe {
              left:0;
              top:0;
              height:100%;
              width:100%;
              position:absolute;
            }
          </style>
    
          <!-- Section heading -->
         
          <br>
          <!-- Section description -->
    
          <!-- Grid row -->
          <div class="row">
    
            <!-- Grid column -->
            <div class="col-lg-5 mb-lg-0 pb-lg-3 mb-4">

              
    
              <!-- Form with header -->
              <div class="card">
                <div class="card-body">
                  <!-- Header -->
                  <div class="form-header pink accent-1">
                    <h3 class="mt-2"><i class="fas fa-envelope"></i> Write to us:</h3>
                  </div>
                  <!-- Body -->

<form method="post">
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="form-name" class="form-control" required>
                    <label for="form-name">Your name</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" name="form-email" class="form-control" required>
                    <label for="form-email">Your email</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-tag prefix grey-text"></i>
                    <input type="text" name="form-Subject" class="form-control">
                    <label for="form-Subject">Subject</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                    <textarea name="form-text" class="form-control md-textarea" rows="3" required></textarea>
                    <label for="form-text">Send message</label>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-primary" name="submit">Submit</button>
                  </div>

          </form>

                </div>
              </div>
              <!-- Form with header -->
    
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class="col-lg-7">
    
              <!--Google map-->
              <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                <iframe src="https://maps.google.com/maps?q=hospital/@12.9429015,77.6172504,21z&t=&z=15&ie=UTF8&iwloc=&output=embed " frameborder="0"
                  style="border:0" allowfullscreen></iframe>
              </div>

              <div class="row text-center">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        
                    <i class="bi bi-geo-alt-fill" style="font-size: 40px;"></i>
        
                  <p class="font-weight-bold my-3">Address</p>
        
                  <p class="text-muted">Bnagalore, India</p>
        
                </div>
                <!--Grid column-->
        
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        
                    <i class="bi bi-telephone-fill" style="font-size: 40px;"></i>
        
                    <p class="font-weight-bold my-3">Phone number</p>
          
                    <p class="text-muted">+  886 666 00555</p>
        
                </div>
                <!--Grid column-->
        
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        
                    <i class="bi bi-envelope-fill" style="font-size: 40px;"></i>
        
                    <p class="font-weight-bold my-3">E-mail</p>
          
                    <p class="text-muted">selaginellabryopteris1234@gmail.com</p>
        
                </div>
                <!--Grid column-->
        
              </div>


            
              <!-- Buttons-->
    
            </div>
            <!-- Grid column -->
    
          </div>
          <!-- Grid row -->
    
        </section>
        <!--Section: Content-->
        </div> </div>
    


       

    
      <section class="bot">
    <div>
        <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/bf12c23d-5003-4f6c-80a0-78dcf78108d1"></iframe>
    </div>

    <div class="botinfo"><img src="bot.png.png" width="200px" height="200px">Hi, there. <p>The Hospital Chat Bot is there to assist you with anything you need.A hospital chatbot is a software designed to interact with patients, visitors, and staff of a hospital through text or voice messaging platforms. 
        The purpose of a hospital chatbot is to provide an easy and efficient way for patients and visitors to access information about the hospital, such as its location, services, visiting hours, and more. It can also help patients book appointments, check their medical records, and receive guidance on common health issues.
        
       </div>
    
    


</section>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<!--=== Footer ===-->
<div class="footer-v1" style="background-color:#272727 ;color:white; padding-top:1cm;">
		<div class="footer">
		<div class="container">
		<div class="row">
		<!-- About -->
		<div class="col-md-3" style="margin-bottom: 40px;">
		<a href="index.html"><img id="logo-footer" class="footer-logo" src="logo.jpg" alt="Logo" width="200" height="80"/></a>
		<p style="color:white">At SB Hospital, we are convinced that 'quality' and 'lowest cost' are not mutually exclusive when it comes to healthcare delivery.</p>
		<p style="color:white">Our mission is to deliver high quality, affordable healthcare services to the broader population in India.</p>
		</div><!--/col-md-3-->
		<!-- End About -->

		<!-- Latest -->
		<div class="col-md-3" style="margin-bottom: 40px;">
		<div class="posts">
		<div class="headline"><h2>Latest Posts</h2></div>
		<ul class="list-unstyled latest-list">
		<li>
		<a href="blog.html">Incredible content</a>
		<small>April, 2023</small>
		</li>
		<li>
		<a href="gallery.php">Latest Images</a>
		<small>April, 2023</small>
		</li>
		<li>
		<a href="terms.html">Terms and Conditions</a>
		<small>April, 2023</small>
		</li>
		</ul>
		</div>
		</div><!--/col-md-3-->
		<!-- End Latest -->

		<!-- Link List -->
		<div class="col-md-3" style="margin-bottom: 40px;">
		<div class="headline"><h2>Useful Links</h2></div>
		<ul class="list-unstyled link-list">
		<li><a href="AboutUsfinal/AboutUs/about.php">About us</a><i class="fa fa-angle-right"></i></li>
		<li><a href="contact.php">Contact us</a><i class="fa fa-angle-right"></i></li>
		<li><a href="bookappoinment.php">Book Appointment</a><i class="fa fa-angle-right"></i></li>
        <li><a href="emergency.php">Emergency</a><i class="fa fa-angle-right"></i></li>
		</ul>
		</div><!--/col-md-3-->
		<!-- End Link List -->

		<!-- Address -->
		<div class="col-md-3 map-img" style="margin-bottom: 40px;">
		<div class="headline"><h2>Contact Us</h2></div>
		<address class="md-margin-bottom-40">
		SB Hospital <br />
		Bangalore, IN <br />
		Phone: 886 666 00555 <br />
		Mail :selaginellabryopteris1234@gmail.com
		</address>
		</div><!--/col-md-3-->
		<!-- End Address -->
		</div>
		</div>
		</div><!--/footer-->

		<div class="copyright" style="background-color:black ;color:white">
		<div class="container">
		<div class="row">
		<div class="col-md-6">
		<p style="color:white">
		2023 &copy; All Rights Reserved.
		<a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms of Service</a>
		</p>
		</div>

		</div>
		</div>
		</div>
		</div>
</div>  <!-- End Wrapper -->

</body>
</html>



