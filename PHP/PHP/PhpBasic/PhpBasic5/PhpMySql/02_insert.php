<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dt";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if(!$conn){
        die("Connection Failed".mysqli_connect_error);
    }

    echo "Connection Successful <hr>";

    $sql = " Insert into students(name,roll,address) values('Rohan',103,'Kolkata')";

    if(mysqli_query($conn,$sql)){
        echo "New Record Inserted Successfully";
    } else {
        echo "Unable to Insert Data";
    }

?>