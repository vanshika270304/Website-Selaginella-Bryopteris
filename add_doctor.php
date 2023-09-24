<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $speciality = $_POST['speciality'];
    $experience = $_POST['years'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // prepare SQL query
    $sql = "INSERT INTO doctor_details (first_name, last_name, gender, speciality, years_of_experience, email, phone_number, address)
        VALUES ('$first_name', '$last_name', '$gender', '$speciality', '$experience', '$email', '$phone_number', '$address')";


    // execute query
    if(mysqli_query($con, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    // close connection
    mysqli_close($con);
}
?>