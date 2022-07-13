<?php
    // While loop
    /*
    // Example 1
    $num = 1;
    while($num <= 5)
    {
        echo "GeekyShow Count: $num <br>";
        $num++;
    }

    echo "Rest of the code";

    
    // Another way 
    $num = 1;
    while($num <= 5):
        echo "GeekyShows Count: $num <br>";
        $num++;
    endwhile;

    echo "Rest of the code";

    

    // Break in loop

    $num = 1;
    while($num <= 5):
        echo "GeekyShows Count: $num <br>";
        $num++;
        if($num==3)
            break;
    endwhile;

    echo "Rest of the code";

    */

    // Nested While loop

    $num =1;
    while($num <= 2)
    {
        echo "GeekyShows Count: $num <br>";
        $num++;
        $val = 1;
        while($val <= 3)
        {
            echo "Val: $val <br>";
            $val++;
        }
    }
?>