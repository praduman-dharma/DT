<?php
    #
    // Local variable - The variable which is dedicated inside a fuction has a LOCAL scope.
    // Its value remains valid just within the function.

    // function display()
    // {
    //     $a = 10;        // Local Variable
    //     echo "Accessing Value inside Function = $a <br>";
    // }
    // display();
    
    // below code will not work,can't access $a outside function
    // echo "Accessing Value outside Function = $a <br>";

    # 
    // Global Variable - The variable which is declared outside a function has GLOBAL scope. 
    // Its accessibility is just outside the function

    // Global Keyword - If we want to access data outside a fuction from code 
    // inside a function we have to use global keyword within the function.

    
    
    // $a = 10;            // Global Variable
    // function display()
    // {
    //     global $a;      // defining its global
    //     echo "Accessing Value Inside Function = $a <br>";
    // }
    // display();
    // echo "Accessing Value Outside Function = $a <br>";

    #
    // Static Variable - A variable within a function reset every time when we call it.
    // In case we need, variable values to remain save even outside the function then we have // to use static keyword
    // Static Variable scope is local

    function disp()
    {
        static $a = 0;
        $a++;
        return $a;
    }
    echo disp() . "</br>";      // 1
    echo disp() . "</br>";      // 2
    echo disp() . "</br>";      // 3


    
?>
