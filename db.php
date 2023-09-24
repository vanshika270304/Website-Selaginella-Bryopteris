<?php
$con = mysqli_connect("localhost", "root", "", "hospital");

if(!$con) {
    die("Connection Error");
}

$query = "SELECT * FROM Medicines";
$result = mysqli_query($con, $query);

$query1 = "SELECT * FROM patient_details";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT * FROM doctor_details";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT * FROM medicine";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT * FROM ambulancerequest";
$result4 = mysqli_query($con, $query4);

$query5 = "SELECT * FROM contactus";
$result5 = mysqli_query($con, $query5);

$query6 = "SELECT * FROM labtest";
$result6 = mysqli_query($con, $query6);

$query7 = "SELECT * FROM bookappoinment";
$result7 = mysqli_query($con, $query7);

$query8 = "SELECT * FROM medicineorder";
$result8 = mysqli_query($con, $query8);

$query9 = "SELECT * FROM medicine_billing_address INNER JOIN medicineorder ON medicineorder.orderid = medicine_billing_address.orderid";
$result9 = mysqli_query($con, $query9);

?>




