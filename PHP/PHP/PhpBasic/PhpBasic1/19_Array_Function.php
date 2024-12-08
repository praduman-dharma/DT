<?php

    // $name[0] = "Rahul";
    // $name[1] = "Sumit";
    // $name[2] = "Suman";
    // $name[3] = "Rohan";

    # below array return using array fucntion

    // $name = array("Rahul","Sumit","Suman","Rohan");
    // echo $name[0];

    # Modifying and deleting Array Element

    // $name [0]  = "Rahul";
    // $name [1]  = "Sonam";
    // $name [2]  = "Sumit";

    // echo $name [1] . "<br>";   // for modifying ,rewrite the array element.
    
    // $name [1] = "PHP";
    // echo $name[1];
    
    // unset($name[1]);        // unset() function is used to delete an array element.
    // echo $name[1];

    # same process for modifying and deleting other arrays type like associative arrays.

    # Example 2
    $name [0]  = "Rahul";
    $name [1]  = "Sonam";
    $name [2]  = "Sumit";

    # Copy array
    $Student = $name;       // We can copy entire array using assignment operator.
    echo $name[1];
    echo $Student[2];       // you can print value by refrence variable as well.



?>  