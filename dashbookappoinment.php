<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM bookappoinment";
$result = $conn->query($sql);



$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Times New Roman";
  margin:0;
}

.aligned {
    display: flex;
    align-items: center;
    padding-bottom: 0;
    border-bottom: 0.2cm;
    border-bottom-color: rgba(0, 0, 0, 0.581);
    border-bottom-style: solid;
    background-color: rgba(60, 179, 114, 0.37);
}

span {
    padding: 20px;
    font-weight: bold;
    font-size: 20px;
    margin-top: 0;
    padding-left: 1cm;
}
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#c9d8d2;
  overflow-x: hidden;
  padding-top: 20px;
  margin-top:1.8cm;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 220px; /* Same as the width of the sidenav */
}

table, th, td {
    border: 1px solid black;
    padding:0.2cm;
}
th
{
    background-color:azure;
}



@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="aligned">
        <img src="logo.jpg" width="100" alt="">

        <span>SELAGINELLA BRYOPTERIS HOSPITAL</span>
    </div>

<div class="sidenav">
  <a href="#">Doctors</a>
  <a href="#">Staffs</a>
  <a href="dashbookappoinment.php">Doctor's Appointment</a>
  <a href="#">Medicines</a>
  <a href="#">Lab Tests</a>
  <a href="#">Issues Mailed</a>
  <a href="#">Ambulance Request</a>
</div>

<div class="main">
    <?php

echo "<h1>DOCTORS APPOINTMENT DETAILS</h1>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>BOOKING ID</th><th>FULL NAME</th><th>AGE</th><th>GENDER</th><th>CONTACT</th><th>EMAIL ID</th><th>SPECIALIST</th><th>DOCTOR</th><th>DATE</th><th>TIME</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["bookingid"]. "</td><td>" . $row["name"]. "</td><td> " . $row["age"]. "</td> <td>" . $row["gender"]. "</td> <td>" . $row["contact"]. "</td> <td>" . $row["mail"]. "</td> <td>" . $row["specialist"]. "</td><td> " . $row["doctor"]. "</td><td> " . $row["datee"]. "</td><td> " . $row["timee"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


    ?>
  </div>
   
</body>
</html> 

    