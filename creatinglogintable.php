<?php
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname="hospital";

    $connection = mysqli_connect($host, $username, $password,$dbname);
    if (!$connection) 
    {
        die("Connection Unsucessful: " . mysqli_connect_error());
    }
    
    $query = "CREATE TABLE loginforpatient (
        firstname VARCHAR(15) NOT NULL,
        middlename VARCHAR(15),
        lastname VARCHAR(20) NOT NULL,
        emailid VARCHAR(30) NOT NULL,
        gender VARCHAR(7) NOT NULL,
        phone INT(10) PRIMARY KEY,
        username VARCHAR(10) UNIQUE NOT NULL,
        password VARCHAR(15) NOT NULL)";

    if (mysqli_query($connection, $query)) 
    {
        echo "Table Created!";
        
    } 
    else 
    {
        echo "Table Creation Failed" . mysqli_error($connection);
    }

    $query = "CREATE TABLE loginfordoctor(
        firstname VARCHAR(15) NOT NULL,
        middlename VARCHAR(15),
        lastname VARCHAR(20) NOT NULL,
        emailid VARCHAR(30) NOT NULL,
        gender VARCHAR(7) NOT NULL,
        phone INT(10) PRIMARY KEY,
        username VARCHAR(10) UNIQUE NOT NULL,
        password VARCHAR(15) NOT NULL)";

    if (mysqli_query($connection, $query)) 
    {
        echo "Table Created!";
        
    } 
    else 
    {
        echo "Table Creation Failed" . mysqli_error($connection);
    }
    mysqli_close($connection);
?>