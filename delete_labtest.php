<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM labtest WHERE id = '$id'";
    $result = mysqli_query($con,$query);

    if($result){
        echo "Delete successful";
    } else {
        die("Deletion error: " . mysqli_error($con));
    }
}
?>
