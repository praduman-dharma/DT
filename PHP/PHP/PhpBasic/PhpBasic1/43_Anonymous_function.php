<?php
    # Anonymous Function, also known as closures of Lambda,allow the creation of function
    // which have no speacial name.

        // Can be stored in a Variable
        // Can be Returned in a Function
        // Can be pass in a Function

    // Syntax - 
        // function(){
        //     block of statement;
        // };                          // don't forget write semicolon.

    # Normal function
    // function show(){
    //     echo "Normal Function";
    // }
    // show();

    # Anonymous function
    // $a = function(){
    //         echo "Anonymous Function";
    //     };
    
    // $a();                   
    
    # 2
    # Anonymous function
    // $y = 10;                // global variable
    // $a = function($p){
    //         echo "Anonymous Function $p";
    //     };
    
    // $a($y);                   

    # 3
    # Anonymous function
    // $r = 10;                             // global variable
    // $a = function() use($r){            // we can use global variable by using use keyword
    //         echo "Anonymous Function $r";
    //     };
    
    // $a();                   
    
    # 4
    # Anonymous function
    $y = 34;                // global variable
    $r = 10;                // global variable
    $a = function($p) use($r){              // we can use global variable by using use keyword
            echo "Anonymous Function $r $p";
        };
    
    $a($y);                   
    
?>