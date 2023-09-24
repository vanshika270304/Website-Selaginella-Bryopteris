<?php

include("connection.php");

function random_strings($length_of_string)
{
 
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}
 
// This function will generate
// Random string of length 10


$query = "CREATE TABLE IF NOT EXISTS bookappoinment (
    bookingid Varchar(5) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age int NOT NULL,
    gender VARCHAR(20) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    specialist varchar(40) not null,
    doctor varchar(40) not null,
    datee date not null,
    timee varchar(20) not null
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
    die("Failed to create table: " . mysqli_error($connection));
}


if (isset($_POST['Book'])) 
{
    
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $specialist = mysqli_real_escape_string($connection, $_POST['specialist']);
    $doctor = mysqli_real_escape_string($connection, $_POST['doctor']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $time = mysqli_real_escape_string($connection, $_POST['time']);
    $bookid=random_strings(5);

   $query ="SELECT * from bookappoinment where datee='$date' && doctor='$doctor' && timee='$time'"; 

    $result = mysqli_query($connection,$query);
    //declare array to store the data of database

    //$rowcount = mysqli_num_rows( $result );
   
    if (mysqli_num_rows($result) > 0)
    {
    //   echo '<script>alert("Sorry, this slot is not free. Kindly choose a different slot or a date")</script>';
    
      // echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script> ";
      // echo "<script>Swal.fire({
      //   icon: 'error',
      //   title: 'Oops...',
      //   text: 'Something went wrong!'
      // })</script>";

      header("Location: alert1.html");

    }
    else
    {
    $query = "INSERT INTO bookappoinment (bookingid ,name, age, gender,contact,mail,specialist,doctor,datee,timee) VALUES ('$bookid','$name', ' $age', '$gender', '$contact', '$mail','$specialist','$doctor', '$date', '$time')";

    $result = mysqli_query($connection, $query);

    // $_SESSION['mail'] = $email;
    // $_SESSION['name'] = $name;
    //   header('Location: mail.php');
    //   exit;
    

    // $_SESSION['mail']=$email ;
    // $_SESSION['name'] =$name;

    // Check for errors executing the query
    if (!$result) {
        die("Failed to insert record: " . mysqli_error($connection));
    }


     header("Location: alert2.html");
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book appoinment</title>
    <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  

  <!-- <link href="bookappoinment.css" rel="stylesheet"> -->

  <link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="bookappoinment.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="aligned">
        <img src="logo.jpg" width="100" alt="">

        <span>SELAGINELLA BRYOPTERIS HOSPITAL</span>
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

    <P></P>
    <section class="bookappointment">
        <div class="bookappointment1">
<h1 id="h1meet">MEET WORLD'S<br> NO. 1 DOCTORS</h1>
        </div>


        <div class="bookappointment2">
            <div class="bookappointmentform">



                <form method="post">
                    <label for="name">FULL NAME*</label><br>
                    <input type="text" id="name" class="textt" name="name" required>

<p>
                    <label for="age">AGE</label><br>
                    <input type="number" id="age" name="age" class="textt">

                    <p>
                        <label for="gender">GENDER</label><br>
                        <select id="gender" class="textt" name="gender">
                            <option value="">-please select an option-</option>
                            <option value="male" >MALE</option>
                            <option value="female" >FEMALE</option>
                            <option value="others" >OTHERS</option>

                        </select>
                    
                        <p>
                    <label for="contact">CONTACT NUMBER*</label><br>
                    <input type="tel" id="contact" name="contact" class="textt" required>
                    <p>

                    <label for="mail">EMAIL ID*:</label><br>
                    <input type="email" id="mail" class="textt" name="mail" required>

                    <p>
                        <label for="state">CHOOSE SPECIALIST*:</label><br>
                <select id="state" class="textt" name="specialist" required>
            </select>

            <p>
            <label for="city">CHOOSE DOCTOR*:</label><br>
                <select id="city" class="textt" name="doctor" required>
            </select>


            <p>
                        <label for="book">CHOOSE A DATE*: </label><br>
                    <input type="date" id="book" class="textt" name="date" required>
                    <p>


                    <label for="doc">CHOOSE TIME*:</label><br>
                        <select id="slot" class="textt" name="time" required>
                            <option value="">-please select an option-</option>
                            <option value="9:00 am">9:00 am</option>
                            <option value="9:30 am">9:30 am</option>
                            <option value="10:00 am">10:00 am</option>
                            <option value="10:30 am">10:30 am</option>
                            <option value="11:00 am">11:00 am</option>
                            <option value="11:30 am">11:30 am</option>
                            <option value="12:00 am">12:00 am</option>
                            <option value="12:30 am">12:30 am</option>
                          </select>
                  

                          <input type="submit" name="Book" value="BOOK APPOINTMENT" id="bookappoinmnetbutton">
                </form>
            </div>

        </div>
    </section>



<script>

/**
Select options object for state and city select elements and relationship
*/
const selectOptions = [
{
name: "Cardiologist",
cities: [
"Dr. Nagaraj Agarwal",
"Dr. Anurag Bothra",
"Dr. Nikhil Bhatt",
],
},
{
name: "Neurologist",
cities: [
"Dr. Mallikarjun Roy ",
"Dr. Josna Bhansali",
"Dr. Santosh Kumar",
],
},
{
name: "Radiologist",
cities: [
"Dr. Raghunath Chatterjee",
"Dr. Asha Nayak",
],
},
{
name: "Oncologist",
cities: [
"Dr. Sushma Jain",
"Dr. Sangeetha Jindal",
],
}
];

/**
Create an option element
@param {string} value - Option value
@return {Element} - option element
*/
function createOption(value) {
const opt = document.createElement('option');
const textNode = document.createTextNode(value);
opt.appendChild(textNode);
opt.value = value;
return opt;
}

/**
Create options with Select
@param {string} selectId - parent of options
@param {array} options - arrays of options
*/
function createOptionsSelect(selectId, options) {
const select = document.getElementById(selectId);

// clear all previous options 
select.innerHTML = '';

for(let i=0;i<options.length;i++) {
select.appendChild(options[i]);
}    
}

/**
* Retrieve state values from selectOptions
* @return {array} state values
*/
function getSelectOptionsStates() {
return selectOptions.map(value => value.name);
}

/**
* Retrieve cities - values from selectOptions
* @param {string} state - selected state
* @return {array} - state cities
*/
function getSelectOptionsCities(state) {
return selectOptions
.filter(value => value.name===state)
.map(val => val.cities)[0];
}

/**
* Create select id=state with all the state options
*/
function createStateSelect() {
const states = getSelectOptionsStates();
const stateOptions = states.map(state => createOption(state));
createOptionsSelect('state', stateOptions);
}

/**
* Create select id=state with all the city options
*/
function createStateSelect() {
const states = getSelectOptionsStates();
const options = states.map(state => createOption(state));
createOptionsSelect('state', options);
}

/**
* Create select id=city with all the city options
* @param {string} stateId - selected state Id
*/
function createCitySelect(stateId) {
const cities = getSelectOptionsCities(stateId);
const options = cities.map(city => createOption(city));
createOptionsSelect('city', options);
}

/**
* onChange event trigger for state select 
*/
function onSelectState() {
const selectedState = document.getElementById('state').value;
createCitySelect(selectedState);
}

/**
* onload callback
*/
function init() {
// Default state select
const selectedStateDefault = 'state1';

// console.log(getSelectOptionsStates());
// console.log(getSelectOptionsCities('state3'));

document.getElementById('state').addEventListener('change', (e) => onSelectState(e), false);

createStateSelect();
createCitySelect(selectedStateDefault);
}

onload = init;

</script>



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





