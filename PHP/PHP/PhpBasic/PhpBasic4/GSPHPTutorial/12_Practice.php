<?php
    // $conn = mysqli_connect("localhost","root","","test_db");

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);
    if($conn){
        echo "Connected Successfully<hr>";
    }

    $sql = "select * from student";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row["id"];
        }
    }

?>