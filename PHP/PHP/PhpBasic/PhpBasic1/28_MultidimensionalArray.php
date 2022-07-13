<?php
    // $fees = array("Rahul","Sonam","Sumit");  # both array is same
    // $fees = array("Rahul",                  
    //               "Sonam",
    //               "Sumit");     

    # Multidimensional Array is Arrays of Arrays.
    # Multidimensional array can be 2D ,3D, 4D etc.

    # Multi D Numeric Array
    /*
    $laptop = array(
        array("Rahul","dell",10),

        array("Sonam","hp",20),

        array("Sumit","zed",30)
    );
    */
    // above array return in another way for explanation

    // $laptop[0][] = "Rahul";
    // $laptop[0][] = "dell";
    // $laptop[0][] = 10;

    // $laptop[1][0] = "Sonam";  # You can empty second bracket but you can't empty first bracket
    // $laptop[1][1] = "hp";
    // $laptop[1][2] = 20;

    // $laptop[2][] = "Sumit";
    // $laptop[2][] = "zed";
    // $laptop[2][] = 30;

    // echo $laptop[2][2];     # for printting value you can't empty brackets.

    # Multi D Associative array
    /*
    $fees = array(
        "Rahul" => array("php" => 10,"java" => 20,"css" => 30),
        "Sonam" => array("php" => 30, "java"  => 40, "css" => 10),
        "Sumit" => array("php" => 50, "java" => 60, "css" => 40)
    );
    */

    // above array return in another way for explanation
    $fees["Rahul"]["php"] = 10;
    $fees["Rahul"]["java"] = 20;
    $fees["Rahul"]["css"]  = 30;

    $fees["Sonam"]["php"] = 30;
    $fees["Sonam"]["java"] = 30;
    $fees["Sonam"]["css"] = 30;

    $fees["Sumit"]["php"] = 50;
    $fees["Sumit"]["java"] = 60;
    $fees["Sumit"]["css"] = 40;

    echo $fees["Sumit"]["java"];    # for printting value you can't empty brackets.
?>