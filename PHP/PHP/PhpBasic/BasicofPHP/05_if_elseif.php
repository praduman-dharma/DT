<?php
    /*
    // Example 1
    $price = 10;
    if($price > 40)
    {
        echo "If Condition is True <br>";
    }
    elseif ($price > 30)
    {
        echo "1st Else If Condtion is True <br>";
    }
    elseif($price > 20)
    {
        echo "2nd Else If Condtion is True <br>";
    }
    else {
        echo "All Condtion is False <br>";
    }

    echo "Rest of the code <br>";

    */

    $price = 40;
    if($price > 40):
        echo "If condition is True <br>";
    elseif($price > 30):
        echo "1st Else If condition is True <br>";
    elseif($price > 20):
        echo "2nd Else If condtion is True <br>";
    endif;
    echo "Rest of the code <br>";

?>