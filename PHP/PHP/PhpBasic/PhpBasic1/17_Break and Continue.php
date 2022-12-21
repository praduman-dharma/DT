<?php
    # Break Statement - This is used to stop loop or switch statement at any time.
    # Continue Statement - This statement is used to skip an iteration of a loop.

    # Example of Break Statement

    // for ($num = 1; $num <= 5; $num++)
    // {
    //     echo "GeekyShows Count: $num <br>";
    //     if ($num == 2)
    //         break;                          # it will break the loop
    // }

    # Example of Continue Statement

    for ($num = 1; $num <= 5; $num++)
    {
        if ($num == 2)
            continue;       # continue will skip the current iteration
        echo "GeekyShows Count:$num <br>";
    }
?>