<?php
    # String Operators
    //  1. .(dot) Concatenation
    //  2. .=(dot equal) Combined Concatenation
    
    //  1. .(dot) Concatenation

    // $name1 = "Geeky ";
    // $name2 = "Shows";
    // echo $name1 . $name2 . " Good" . "<br>";   
    
    //  2. .=(dot equal) Combined Concatenation

    $name1 = "Geeky ";
    $name2 = "Shows";
    $name3 = "Good";
    $name3 .= "Site";   //  $name3 = $name3 . "Site"
    echo $name1 . $name2 . "<br>";   
    echo $name3; 
?>