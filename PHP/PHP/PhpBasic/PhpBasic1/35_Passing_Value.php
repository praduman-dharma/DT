<?php
    # Pass by value

    // $n = 2;
    // echo "Value of n is $n";
    // function add($a)            // $n = $a = 2 Here n is duplicate n(copy of n)
    // {
    //     echo "Value inside function $a <br>";
    //     $a = 4;                 // $n = 4
    //     echo "Value inside function $a <br>";
    // }
    // add($n);                    // $n = 2;
    // echo "Value of n = $n <br>";

    # Pass by Reference
    
    $n = 2;
    echo "Value of n is $n <br>";
    function add(&$a)                        // We use &(ampersand) sign in pass by reference
    {
        echo "Value inside function $a <br>";
        $a = 4;
        echo "Value inside function $a <br>";
    }
    add($n);
    echo "Value of n is $n";
?>