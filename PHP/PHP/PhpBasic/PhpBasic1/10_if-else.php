<?php
    # if else
    # Example 1

    // if (10<2)
    // {
    //     echo "Condition is True <br>";
    // }
    // else{
    //     echo "Condition is False <br>";
    // }

    // echo "Rest of the code";


    # Exaple 2 (Example 1 return in another format)

    // if (10>2):
    //     echo "Condition is True <br>";  # don't write endif here, if you are using if-else 
    // else:
    //     echo "Condition is False <br>";
    // endif;                              # for ending if,else block

    // echo "Rest of the code";


    # Nested if-else statement

    # Example 3

    // if(10>2)
    // {
    //     echo "Main Condition is True  <br>";
    //     if(10>5)
    //     {
    //         echo "Nested Condition is True <br>";
    //     }
    //     else{
    //         echo "Nested Condition is False <br>";
    //     }
    // }

    // else{
    //     echo "Main Condition is False   <br>";
    // }

    // echo "Rest of the code";

    # Example 4     - (Example 3 return in another format)

        if(10>2):
            echo "Main Condition is True  <br>";
            if(10>5):
                echo "Nested if is True <br>";
            else:
                echo "Nested if is False    <br>";
            endif;
        else:
            echo "Main Condition is False   <br>";
        endif;

        echo "Rest of the code"

?>