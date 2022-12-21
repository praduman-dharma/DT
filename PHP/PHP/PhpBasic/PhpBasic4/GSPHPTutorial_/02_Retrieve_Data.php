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

    echo "Connection Successfully <hr>";

    $sql = "select * from student";
    $result = $conn->query($sql);
                                            // echo $result->num_rows;    
                                            // It will count num of rows in Student table.
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo " ID: " . $row['id'] . " Name: " . $row['name'] . " Roll: " . $row['roll'] . " Address: " . $row['address'] . "<br>";
        }
    } else {
        echo "0 Record";
    }


?>