<?php
    # mostly while ham jab use karte jab hame end condition nahi malum hota he
    // # Example 1
    // $num = 1;
    // while($num <= 5)
    // {
    //     echo "GeekyShows Count: $num <br>";
    //     $num++;
    // }
    // echo "Rest of the code";

    # Example 2 - Example 1 return in another format

    // $num = 1;
    // while ($num <=5):                   # first { (curly bracket) replace by :(colon)
    //     echo "GeekyShows Count: $num <br>";
    //     $num++;
    // endwhile;                           # and } (ending curly bracket)replace  by endwhile;
    // echo "Rest of the code";

    # Example 3

    // $num = 1;
    // while (TRUE)
    // {
    //     echo "GeekyShows Count: $num <br>";
    //     $num++;
    //     if ($num==5)
    //         break;
    // }
    // echo "Rest of the code"

    # Nested While loop

    # Example 1

    // $num = 1;
    // while ($num <= 2)
    // {
    //     echo "GeekyShows Count: $num <br>";
    //     $num++;
    //     $val = 1;
    //     while ($val <= 3)
    //     {
    //         echo "Val: $val <br>";
    //         $val++;
    //     }
    // }


    # Example 1 return in another format

        $num = 1;
        while($num <= 2):
            echo "GeekyShows Count: $num <br> ";
            $num++;
            $val = 1;
            while($val <= 3):
                echo "Val: $val <br>";
                $val++;
            endwhile;
        endwhile;

?>