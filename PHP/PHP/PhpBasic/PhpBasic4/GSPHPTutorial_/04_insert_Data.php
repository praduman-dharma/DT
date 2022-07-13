<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    // Create Connection
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name);

    // Check Connection
    if($conn->connect_error){
        die("Connection Failed");
    }

    echo "Connection Successfuly <hr>";


    // Insert Data 

    $sql = "insert into student (name, roll, address) values('Nirmal','107','MP')";
    if($conn->query($sql) === TRUE){
        echo "Record Inserted Successfuly";
    } else {
        echo "Unable to Insert Data";
    }

    $conn->close();             // Closing Connection
?>