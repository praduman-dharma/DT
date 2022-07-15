<?php
    /*
    go to postman than select post > type url > http://localhost/php-rest-api/api-insert.php > body > raw > {
                                            "sname": "Manoj Kumar",
                                            "sage": 25,
                                            "scity":"Bhopal"
                                        } 
                                        > send.
    */

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Ray-Requested-With');

    // X-Ray-Requested-With > this is use for inserting data that comes from ajax only

    $data = json_decode(file_get_contents('php://input'), true);  // php://input > this can read any kind or data
    
    $name = $data["sname"];
    $age = $data["sage"];
    $city = $data["scity"];

    include("config.php");
    
    $sql = "INSERT INTO students(student_name,age,city) VALUES ('{$name}',{$age},'{$city}')";
    
    if(mysqli_query($conn,$sql)){
        echo json_encode(array("message" => "Student Record Inserted.","status" => True));
    
    } else {
    
        echo json_encode(array("message" => "Student Record Not Inserted.","status" => false));

    }
