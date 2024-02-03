<?php

// go to postman than select post > type url > http://localhost/php-rest-api/api-fetch-single.php > body > raw > {"sid":"2"} > send.

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Ray-Requested-With');


// Without Validation 

// $data = json_decode(file_get_contents('php://input'), true);  // php://input > this can read any kind or data

// $student_id = $data["sid"];

// include("config.php");

// $sql = "DELETE from students WHERE id = {$student_id}";    

// if(mysqli_query($conn,$sql)){
//     echo json_encode(array("message" => "Student Record Deleted.","status" => True));
// } else {

//     echo json_encode(array("message" => "Student Record Not Deleted.","status" => false));

// }


// With the Validation.

$data = json_decode(file_get_contents('php://input'), true);  // php://input > this can read any kind or data

$student_id = $data["sid"];

include("config.php");

$sql = "SELECT * from students WHERE id = {$student_id}";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");


if (mysqli_num_rows($result) > 0) {

    $sql = "DELETE from students WHERE id = {$student_id}";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("message" => "Student Record Deleted.", "status" => True));
    } else {

        echo json_encode(array("message" => "Student Record Not Deleted.", "status" => false));
    }
} else {

    echo json_encode(array("message" => "No Record Found.", "status" => false));
}
