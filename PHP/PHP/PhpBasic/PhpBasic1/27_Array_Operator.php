<?php
    # PHP Union + Array Operator
    // $a = array("Rahul" => 500,"Sonam" => 600,"Sumit" => 700);
    // $b = array("Rahul" => "PHP","Sonam" =>"Java","Sam" => "CSS","JK" =>"Book");
    
    // // $results = $a + $b;  # a union b, it will add item from a and remove duplicate from b
    // $result = $b + $a;      # b union a, it will add item from b and remove duplicat from a
    // echo print_r($result);

    # PHP Equality == Array Operator
    // key/value pairs same he to True nahi to False.

    // $a = array("Rahul" => 500, "Sonam" =>600, "Sumit" => 700);
    // $x = array("Rahul" => 500, "Sonam" =>600,"Sumit" => 700);
    // $x = array("Sonam" =>600, "Rahul" => 500, "Sumit" => 700);    # order doesn't matter
    // $b = array("Rahul" =>"PHP","Sonam" =>"Java","Sam"=>"CSS", "JK" => "Book");

    // if ($a == $b):
    //     echo "Both Array Key/Value Pair True";
    // else:
    //     echo "Key/Value Pair False";
    // endif;

    # PHP Identity === Array Operator
    // key/value pairs and order and type same he to True nahi to False .

    // $a = array("Rahul" => 500, "Sonam" =>600, "Sumit" => 700);
    // // $x = array("Rahul" => 500, "Sonam" =>600,"Sumit" => 700);
    // // $x = array("Sonam" =>600, "Rahul" => 500, "Sumit" => 700);      # order  matter
    // $b = array("Rahul" =>"PHP","Sonam" =>"Java","Sam"=>"CSS", "JK" => "Book");

    // if ($a === $b):
    //     echo "Both Array Key/Value Pair True";
    // else:
    //     echo "Key/Value Pair False";
    // endif;

    # PHP Inequality != Array Operator AND PHP Inequality <> Array Operator both work same
    // key/value pairs same na ho to True NAHI to False and order of element doesn't matter.

    // $a = array("Rahul" => 500, "Sonam" =>600, "Sumit" => 700);
    // // $x = array("Rahul" => 500, "Sonam" =>600,"Sumit" => 700);
    // $x = array("Sonam" =>600, "Rahul" => 500, "Sumit" => 700);      # order  matter
    // $b = array("Rahul" =>"PHP","Sonam" =>"Java","Sam"=>"CSS", "JK" => "Book");

    // // if ($a != $x):                           # both If work same
    // if ($a <> $x):
    //     echo "Both Array Key/Value Pair True";
    // else:
    //     echo "Key/Value Pair False";
    // endif;

    # PHP Identity !== Array Operator
    // key/value pairs and order and type same NAHI he to True nahi to False .

    $a = array("Rahul" => 500, "Sonam" =>600, "Sumit" => 700);
    $x = array("Rahul" => 500, "Sonam" =>600,"Sumit" => 700);
    // $x = array("Sonam" =>600, "Rahul" => 500, "Sumit" => 700);      # order  matter
    // $b = array("Rahul" =>"PHP","Sonam" =>"Java","Sam"=>"CSS", "JK" => "Book");

    if ($a !== $x):
        echo "Both Array Key/Value Pair True";
    else:
        echo "Key/Value Pair False";
    endif;



    
?>