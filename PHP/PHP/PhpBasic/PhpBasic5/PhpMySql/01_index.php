<?php
    // Create Connection
    // $conn =  mysqli_connect("localhost","root","","test_db");
    
    // // Check connection
    // if($conn){
    //     echo "<h1>Connected Succesfully <hr>";
    // }


    # Method 2

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dt";

    // create connection
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    // Check connection
    if(!$conn){
        die("Connection Failed".mysqli_connect_error);
    } 
    echo "Connected Successfuly<hr>";

    $sql = "Select * from students";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo " ID: " . $row["id"] . " Name: " . $row["name"] . " Roll: " . $row["roll"] . 
            "Address:". $row["address"] . "<br>";
        }
    } else {
        echo "0 Results";
    }

    
    
    

?>