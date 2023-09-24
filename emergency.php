<?php

include("connection.php");


$query = "CREATE TABLE IF NOT EXISTS ambulancerequest (
    name VARCHAR(50) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    location varchar(100) NOT NULL,
    type varchar(20) NOT NULL,
    comments varchar(100),
    requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
    die("Failed to create table: " . mysqli_error($connection));
}


if (isset($_POST['Submit'])) 
{
    
    $name = mysqli_real_escape_string($connection, $_POST['full-name']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact-number']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $type = mysqli_real_escape_string($connection, $_POST['emergency-type']);
    $comments = mysqli_real_escape_string($connection, $_POST['comments']);
    

   
   
    $query = "INSERT INTO ambulancerequest (name	,contact	,location	,type	,comments) VALUES ('$name', '$contact', '$location','$type','$comments')";

    $result = mysqli_query($connection, $query);

    

    // Check for errors executing the query
    if (!$result) {
        die("Failed to insert record: " . mysqli_error($connection));
    }
    else
    {
        header("Location: alert.html");
    }

    // header("Location: mail.php");
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Ambulance Request</title>
  <link rel="stylesheet" type="text/css" href="style.css">


  <link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="emergency.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>


<!-- main header start -->
<p style="background-color:rgb(60, 179, 114);">follow us : <a href="www.google.com"><img src="instagramlogo.png"
                width="15"></a>&nbsp; &nbsp;<a href="www.google.com"><img src="facebook.png" width="15"></a>
        &nbsp; &nbsp;<a href="www.google.com"><img src="twitter.png" width="15"></a>
        &nbsp; &nbsp;<a href="www.google.com"><img src="linkedin.png" width="15"></a>
        &nbsp; &nbsp;<a
            href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=DmwnWrRmTgPGqPwSFPJmdKHwPDVVhcKbQmnbMbvznZKgwXNmpfWkdCLJNRzcqvzxDTxDnFGrshFV"><img
                src="gmail.png" width="15"></a></p>

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

  <header>
    <img src="plus.png" alt="Ambulance Service Logo">
    <h1>AMBULANCE REQUEST</h1>
  </header>

  <section id="form-section">
    <div class="requestform">
    <h2>Request Form</h2>
    <br>
    <form method="post">
      <label for="full-name">Full Name:</label>
      <input type="text" id="full-name" name="full-name" required>
      
      <label for="contact-number">Contact Number:</label>
      <input type="tel" id="contact-number" name="contact-number" required>
      
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>
      
      <label for="emergency-type">Nature of Emergency:</label>
      <select id="emergency-type" name="emergency-type" required>
        <option value="">-- Select --</option>
        <option value="medical">Medical Emergency</option>
        <option value="accident">Accident</option>
        <option value="injury">Injury</option>
        <option value="injury">Suspected stroke or heart attack</option>
        <option value="injury">Loss of consciousness</option>
        <option value="injury">Childbirth Emergency</option>
        <option value="injury">Mental Health Emergency</option>
      </select>
      
      <label for="comments">Additional Comments:</label>
      <textarea id="comments" name="comments" rows="4"></textarea>
      <p>
      <p>Please note that ambulance response time may vary depending on location and availability. Submit request only for genuine emergencies.</p>
      <input  class="ambbutton" type="submit" value="REQUEST AMBULANCE IMMEDIATELY" name="Submit">
    </form>
</div>

    <div>
    <section id="emergency-contact">
    <h2 style="text-align:center;">INDIAN HELPLINE NUMBERS</h2>
    <p>
        <br>

        <p>
    <ul>
    <li><strong>Ambulance Service:</strong> 102</li>
      <li><strong>Police:</strong> 100</li>
      <li><strong>Fire Department:</strong> 101</li>
      <li><strong>National Helpline Number:</strong> 112</li>
    </ul>

    <br>

    For more information visit the following website: <a href="https://indianhelpline.com/">https://indianhelpline.com/</a>
  </section>
</div>
  </section>

  <p>

  <p>
    <br>

    <header>
		<h1 style="text-align:center;font-size:20px;padding-left:1.7cm;">WHAT TO DO WHILE WAITING FOR AN AMBULANCE?</h1>
	</header>

	<main>
		<section>
			<h2>Call Emergency Services Immediately</h2>
			<p>If someone is seriously injured or has a medical emergency, call emergency services immediately. In the United States, the emergency services number is 911. </p>
		</section>

		<section>
			<h2>Provide Basic First Aid</h2>
			<p>While waiting for the ambulance to arrive, provide basic first aid to the person in need. Here are some tips:</p>
			<ul>
				<li>If the person is bleeding, apply pressure to the wound with a clean cloth or bandage to stop the bleeding.</li>
				<li>If the person is choking, perform the Heimlich maneuver to dislodge the object blocking their airway. </li>
				<li>If the person has stopped breathing, provide CPR until the ambulance arrives.</li>
			</ul>
		</section>

		<section>
			<h2>Keep the Person Comfortable</h2>
			<p>Make sure the person in need is comfortable while waiting for the ambulance. Here are some tips:</p>
			<ul>
				<li>Talk to the person and reassure them that help is on the way.</li>
				<li>Keep the person lying down in a safe position if they are unconscious or unable to move.</li>
				<li>If the person is conscious and able to move, help them to a comfortable position and offer them water or other fluids.</li>
			</ul>
		</section>

		<section>
			<h2>Clear the Way for the Ambulance</h2>
			<p>Clear the way for the ambulance to access the location easily. Here are some tips:</p>
			<ul>
				<li>Move any obstacles out of the way, such as parked cars or trash cans.</li>
				<li>Turn on your hazard lights to signal the ambulance.</li>
				<li>If you are in a building, make sure the doors are unlocked and the entrance is clear for the ambulance to enter.</li>
			</ul>
		</section>

		<section>
			<h2>Conclusion</h2>
			<p>Remember that taking immediate action in emergency situations is critical. Call emergency services immediately, provide basic first aid, and clear the way for the ambulance to access the location easily. While waiting for the ambulance, keep the person comfortable and reassure them that help is on the way. </p>
		</section>
	</main>

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



