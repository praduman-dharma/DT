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

    // $name = array("Rahul","Sonam","Sumit","Rohan");  # below array return using function

    // $name[0] = "Rahul";
    // $name[1] = "Sonam";
    // $name[2] = "Sumit";
    // $name[3] = "Rohan";

    // foreach($name as $value){
    //     echo $value . "<br>";
    // }


    // foreach($name as $value):            # above code return in another format
    //     echo $value . "<br>";           
    // endforeach;

    // foreach($name as $key => $value):      # for printing keys/index and values.
    //     echo $key . " " . $value . "<br>";
    // endforeach;


    # foreach with Associative array

    $fees = array("Rahul" => 500 , "Sonam" => 300, "Sumit" => 600);


    // foreach($fees as $money){
    //     echo $money . "<br>";
    // }

    // foreach($fees as $keys => $money){
    //     echo $keys . "=". $money . "<br>";
    // }

    foreach($fees as $keys => $money):
        echo $keys . "=". $money . "<br>";
        // echo "Key:".  $keys . " Value:" .$value . "<br>";
    endforeach;







    


?>