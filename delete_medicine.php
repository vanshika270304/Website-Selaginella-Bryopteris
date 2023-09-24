<?php
include 'db.php';

if(isset($_GET['id'])){
    $order_id = $_GET['id'];

    $query = "DELETE FROM medicines WHERE medicine_id = $order_id";
    $result = mysqli_query($con,$query);

    if($result){
        echo "Delete successful";
    } else {
        die("Deletion error: " . mysqli_error($con));
    }
}
?>