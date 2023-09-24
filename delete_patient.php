<?php
include 'db.php';

if(isset($_GET['id'])){
    $patient_id = $_GET['id'];

    $query = "DELETE FROM patient_details WHERE patient_id = $patient_id";
    $result = mysqli_query($con,$query);

    if($result){
        echo "Delete successful";
    } else {
        die("Deletion error: " . mysqli_error($con));
    }
}
?>