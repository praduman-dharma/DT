<?php
    # First method
    // Create connection
//    $conn = mysqli_connect("localhost","root","","test_db");

//     // Check connection
//     if($conn){
//         echo "Connected Successfully";
//     }

    # method 2 improve version of First method

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    // Create Connection
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    // Check connection
    if(!$conn){
        die("Connection Failed". mysqli_connect_error());
    }

    echo "Connected Successfully <hr>";

    $sql = "select * from student";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo " ID: " . $row["id"] . " Name: " . $row["name"] . " Roll: " . $row["roll"] . 
            "Address:". $row["address"] . "<br>";
        }
    }

    // echo $row["id"];
    // echo $row["name"];
    // echo $row["roll"];
    // echo $row["address"];

?>