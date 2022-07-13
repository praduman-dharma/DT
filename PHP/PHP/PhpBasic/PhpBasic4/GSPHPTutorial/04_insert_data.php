<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    // Create Connection
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    // Check Connection
    if(!$conn){
        die("Connection Failed". mysqli_connect_error());
    } 
    else
    {
        echo "Connected Succesfully <hr>";
    }

    $sql = "INSERT into student (name,roll,address) VALUES('Rohan',20,'Kolkata')";
    
    if(mysqli_query($conn,$sql)){
        echo "New Record Inserted Successfully";
    } else {
        echo "Unable to Insert Data";
    }
?>