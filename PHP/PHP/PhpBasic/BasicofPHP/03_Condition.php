<?php
    // if
    /*
    if(10 > 2)
    {
        echo "Yes, It is True <br>";
    }
    echo "Rest of the code <br>";

    // another method
    if(10 > 2):
        echo "Yes,It is True <br>";
        echo "Yes,It is True <br>";
    endif;
    echo "Rest of the code"

    */

    // nested if
    /*
    if(10 > 2)
    {
        echo "Main 1 <br>";
        if(10 > 5)
        {
            echo "Nested Code excuted 1 <br>";
        }
        if(20 > 5)
        {
            echo "Nested Code excuted 2 <br>";
        }
    }

    if(10 > 5)
    {
        echo "Main 2 <br>";
    }

    echo "Rest of the code";

    */

    if(10>2):
        echo "Main 1 <br>";
        if(10 > 5):
            echo "Nested Code excuted 1 <br>";
        endif;
        if(20>5):
            echo "Nested Code excuted 2 <br>";
        endif;
    endif;

    if(10 > 5):
        echo "Main 2 <br>";
    endif;

    echo "Rest of the code";
?>