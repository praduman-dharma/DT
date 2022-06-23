<?php
    // For loop

    /*
    // Example 1
    for($num = 1; $num <= 3; $num++)
    {
        echo "GeekyShows Count: $num <br>";
    }
    
    
    // another format

    for($num = 1; $num <= 3; $num++):
        echo "GeekyShows Count: $num <br>";
    endfor;

    */

    // Nested for loop

    for($num = 1; $num <= 2; $num++){
        echo "GeekyShows Count: $num <br>";
        for($val = 1; $val <= 3; $val++)
        {
            echo "Val: $val <br>";
        }
    }
    


?>