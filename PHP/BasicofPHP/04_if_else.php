<?php
    // if else
    // Example 1

    /*
    if( 10 < 5)
    {
        echo "Condition is True <br>";
    }
    else {
        echo "Condtion is False <br>";
    }

    echo "Rest of the code";
    

    if(10 < 5):
        echo "Condition is True <br>";
    else:
        echo "Condtion is False <br>";
    endif;

    echo "Rest of the code";

    */

    // Nested if-else statement

    if(10 > 2){
        echo "Main Condition is True <br>";
        if(10<5){
            echo "Nested Condtion is True <br>";
        } 
        else {
            echo "Nested Condtion is False <br>";
        }
    }

    else {
        echo "Main Condition is False <br>";
    }

    echo "Rest of the code";
?>