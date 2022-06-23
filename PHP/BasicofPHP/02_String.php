<?php
    $str = "This
            is 
            string";
    // echo $str;
    
    $num1 = 10;
    $name = "Geeky";
    echo "Value is:", $num1;
    echo "Value is: $num1";
    echo "$name Shows";
    echo "{$name}Shows";
    echo '$name Shows';

    echo "String Operator";
    $name1 = "Geeky";
    $name2 = "Shows";
    $name3 = "Good";
    $name3 .= "Site";

    echo "<br>";
    echo $name1 . $name2;
    echo $name3;

     # strlen(String) - This function is used to find length of string.It also counts whitespaces.
    // echo strlen("GeekyShows");
    // $length = strlen("Geeky Shows");
    // echo $length;

    
    // $name = "GeekyShows";
    // $length = strlen($name);
    // echo $length;
    
    
    # strtoupper(String) - This function is used to convert a string to uppercase.
    # strtolower(String) - This function is used to convert a string to lowercase.
    // $name = "GeekyShows";
    // echo strtoupper($name);
    // echo strtolower($name);

    $name = "Praduman is a good boy";
    echo $name ."<br>";
    echo str_word_count($name) ."<br>";     # This will count word in your string
    echo strrev($name) ."<br>";             # This will reverse the string
    echo strpos($name,"is") . "<br>";                # This search "is " in string
    echo strpos($name,"good") . "<br>";              # This search "good " in string
    echo str_replace("good","bad",$name) . "<br>";   # This will replace good to bad
    echo str_repeat($name,4) . "<br>";             # This will $name  4 times
    // echo "<pre>" ."     This is str" . "</pre>"    # It will print as it is with spaces
    echo "<pre>";
    echo rtrim("       This is good boy     ");   # rtrim remove space from right
    echo "<br>";
    echo ltrim("       This is good boy     ");   # ltrim remove space from light
    echo "</pre>";

    
?>