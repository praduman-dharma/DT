<?php

    // go to postman than select post > type url > http://localhost/php-rest-api/api-fetch-single.php > body > raw > {"sid":"2"} > send.

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // for searching using post method >
    // url > http://localhost/php-rest-api/api-search.php

    // $data = json_decode(file_get_contents('php://input'), true);  // php://input > this can read any kind or data
    
    // $search_value = $data["search"];

    // for searching using get method >
    // url > http://localhost/php-rest-api/api-search.php?search=praduman

    $search_value = isset($_GET['search']) ? $_GET['search'] : die() ;

    include("config.php");
    
    $sql = "SELECT * from students WHERE student_name LIKE  '%{$search_value}%'";
    
    $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
    
    
    if(mysqli_num_rows($result) > 0){
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        echo json_encode($output);  // json_encode - convert array to json
    
    } else {
    
        echo json_encode(array("message" => "No Search Found.","status" => false));
    }

?>