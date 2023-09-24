<?php
include 'db.php';

if(isset($_GET['id'])){
    $name = $_GET['id'];

    $query = "DELETE FROM ambulancerequest WHERE contact = '$name'";
    $result = mysqli_query($con,$query);

    if($result){
        echo "Delete successful";
    } else {
        die("Deletion error: " . mysqli_error($con));
    }
}
?>