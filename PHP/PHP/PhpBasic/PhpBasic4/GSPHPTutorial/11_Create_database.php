<?php
    $db_host = "localhost";
    $db_user= "root";
    $db_password = "";

    // Create Connection
    // When you ceate database don not specify database  name here
    $conn = mysqli_connect($db_host,$db_user,$db_password);

    // Chec Connection
    if(!$conn){
        die("Connection Failed");
    }
        
    echo "Connected Successfuly<hr>";

    // Sql query to Create database;
    $sql = "create database new_db";
    if(mysqli_query($conn,$sql)){
        echo "Database Created Successfully";
    } else {
        echo "Unable to Create Database";
    }

?>