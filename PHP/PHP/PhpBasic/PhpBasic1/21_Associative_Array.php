<?php
    // $fees ["Rahul"] = 500;
    // echo $fees ["Rahul"];
    // echo "Rahul fees:" . $fees["Rahul"];
    // echo "Rahul fees:" , $fees["Rahul"];
    // echo "Rahul fees: {$fees['Rahul']}";  # Associative array me Interpolation use karne ke liye aapko, array ko {}(curly bracket) ke bitch me likhna padta he ,like above.

    # Example 1

    // $fees["Rahul"] = 500;
    // $fees["Sonam"] = 300;
    // $fees["Sumit"] = 600;
    // $fees["Rohan"] = 700;
    // echo $fees ["Rahul"];

    # Example 2 - You can write Example 1 like this
    $fees = array("Rahul" => 500, "Sonam" => 300, "Sumit" => 600);
    echo $fees["Rahul"];

?>