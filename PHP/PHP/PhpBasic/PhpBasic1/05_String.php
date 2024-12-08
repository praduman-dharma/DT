<?php
    # string interpolation
    
    // $str = "This 
    //         is
    //         string";
    // echo $str;

    $num1 = 10;
    $name = "Geeky";
    echo "Value is: ",$num1;
    // echo "Value is: $num1";
    echo "$name Shows";
    echo "{$name}Shows";          # for printing without spaces
    echo '$name shows';           # in single quote string interpolation doesn't work
    echo "$name \$ten";           # for printing $ten 
?>