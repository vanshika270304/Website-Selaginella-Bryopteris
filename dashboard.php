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
  margin-left: 210px; /* Same as the width of the sidenav */
}

.welcome
{
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    font-size: 40px;
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
  <h2 class="welcome"> WELCOME TO ADMIN DASHBOARD!</h2>
  <p>As the administrator of our esteemed hospital, this dashboard is your central hub for managing all aspects of hospital operations. Here, you can easily access and monitor key information, perform administrative tasks, and make informed decisions to ensure smooth and efficient functioning of the hospital.</p>
</div>
   
</body>
</html> 

    