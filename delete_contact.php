<?php
include 'db.php';

if(isset($_GET['id'])){
    $email = $_GET['id'];

    $query = "DELETE FROM contactus WHERE name = '$email'";
    $result = mysqli_query($con,$query);

    if($result){
        echo "Delete successful";
    } else {
        die("Deletion error: " . mysqli_error($con));
    }
}
?>
