<?php
    # foreach loop works only on arrays, and is used to loop through each key/value pair in array.
    // syntax -
    //             foreach($array_name as $value){
    //                 block of statement;
    //             }
    // // syntax -
    //             foreach($array_name as $value):
    //                 block of statement;
    //             endforeach;


    # foreach with numeric array

    // Example
    $name = array("Rahul","Sonam","Sumit","Rohan");
    // foreach($name as $value){
    //     echo $value ."<br>";
    // }

    // foreach($name as $key => $value){
    //     echo $key . " " . $value . "<br>";
    // }


    $fees = array("Rahul" => 500 , "Sonam" => 300, "Sumit" => 600);

    foreach($fees as $key => $value){
        // echo $key ."=".$value."<br>";
        echo "Key:".  $key . " Value:" .$value . "<br>";
    }

    $resutls = print_r($fees,TRUE);
    echo $resutls;

?>