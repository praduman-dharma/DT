<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dt";

    // Create Connection
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    // Check Connection
    if(!$conn){
        die("Connection Failed").mysqli_connect_error();
    } else {
        echo "Connection Succesfuly<hr>";
    }


    $sql = "update students set id='6',name = 'Parth', roll = '104', address='UP' where id=6";
    if(mysqli_query($conn,$sql)){
        echo "Record Updated";
    } else {
        echo "Unable to update";
    }


?>