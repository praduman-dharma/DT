<?php
    # if statement

    # Example 1

    // if (10>2)
    // {
    //     echo " Yes, It is True <br>";
    // }

    // echo "Rest of the code";

    # Example 2
    # We can also write above code like below 

    // if (10>2):                          # first { (curly bracket) replace by :(colon)
    //     echo "Yes, It is True 1 <br>";
    //     echo "Yes, It is True 2 <br>";  # You can write multiple block of statement
    // endif;                              # and } (ending curly bracket)replace  by endif;

    // echo "Rest of the code  <br>";

    # Nested if statement

    # Example 1

    // if (10>2)
    // {
    //     echo "Main 1 <br>";
    //     if (10>5)
    //     {
    //         echo "Nested Code excuted 1 <br/>";
    //     }
    //     if (20>5)
    //     {
    //         echo "Nested Code excuted 2 <br/>";
    //     }
    // }
    
    // if (10>5)
    // {
    //     echo "Main 2 <br>";
    // }

    // echo "Rest of the code";


    # Example 2 - Example 1 in return in another format
    
    if (10>5):                         
        echo "Main 1 </br>";
        if (10>2):                     # first { (curly bracket) replace by :(colon)       
            echo "Nested code excuted 1 </br>";
        endif;                         # and } (ending curly bracket)replace  by endif;
        if(20>5):
            echo "Nested code excuted 2 </br>";
        endif;
    endif;

    if(10>5):
        echo "Main 2 </br>";
    endif;

    echo "Rest of the code";

?>