<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dt";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if(!$conn){
        echo "Connection failed";
    }

    echo "Connection Successful <hr>";

    $sql = "Delete from students where id=4";

    if(mysqli_query($conn,$sql)){
        echo "Record Deleted";
    } else {
        echo "Error Unable to delete";
    }
?>