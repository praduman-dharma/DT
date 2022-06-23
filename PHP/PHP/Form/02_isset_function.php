<?php
    // isset() function  use to check, a value store in variable or not
    // if value is store in variable,isset() function return 1
    // if value is not store in variable or variable is not declare than,isset() function 
    // will return empty

    // Example 1
    $a = "GeekyShows";
    // echo isset($a);

    if(isset($a))
    {
        echo "Data is Set";
    }
    else{
        echo "Data is not set";
    }
?>