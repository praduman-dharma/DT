<?php

    // go to postman than select post > type url > http://localhost/php-rest-api/api-fetch-single.php > body > raw > {"sid":"2"} > send.

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Ray-Requested-With');

    // X-Ray-Requested-With > this is use for inserting data that comes from ajax only

    $data = json_decode(file_get_contents('php://input'), true);  // php://input > this can read any kind or data
    
    $id = $data["sid"];
    $name = $data["sname"];
    $age = $data["sage"];
    $city = $data["scity"];

    include("config.php");
    
    $sql = "UPDATE students set student_name = '{$name}', age = {$age}, city = '{$city}' WHERE id = {$id}";
    
    if(mysqli_query($conn,$sql)){
        echo json_encode(array("message" => "Student Record Updated.","status" => True));
    } else {
    
        echo json_encode(array("message" => "Student Record Not Updated.","status" => false));

    }
