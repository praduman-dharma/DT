<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    // Sql to delete record
    $sql = "DELETE FROM student where id=26";
    if(mysqli_query($conn,$sql)){
        echo "Record Deleted";
    }
    else{
        echo "Error Unable to Delete";
    }
?>