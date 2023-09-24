<?php
include 'db.php';

if(isset($_GET['id'])){
    $doctor_id = $_GET['id'];

    $query = "DELETE FROM doctor_details WHERE doctor_id = '$doctor_id'";
    $result = mysqli_query($con,$query);

    if($result){
        echo "Delete successful";
    } else {
        die("Deletion error: " . mysqli_error($con));
    }
}
?>
