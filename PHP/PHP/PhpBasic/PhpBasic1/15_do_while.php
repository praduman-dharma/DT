<?php
    # do while loop
    # there is no any other format for writing do while loop
    #  Example

    // $num =1;
    // do {
    //     echo "GeekyShows Count: $num <br>";
    //     $num++;
    // } while($num <= 3);

    # Nested do while loop

    $num = 1;
    do
    {
        echo "GeekyShows Count: $num <br>";
        $num++;
        $val = 1;
        do{
            echo "Val: $val <br>";
            $val++;
        }while($val <= 3);
    }while($num <= 2);
?>