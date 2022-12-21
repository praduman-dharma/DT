<?php
    // Conditonal Function - Can't call Condition Function before it's definition

    // if(TRUE)
    // {
    //     function display()
    //     {
    //         echo "Conditiona Function";
    //     }
    // }

    // display();

    # calling function with Condition

    if(TRUE)
    {
        function display()
        {
            echo "Conditiona Function";
        }
    }

    if(TRUE)            // Calling function with Condition
    {
        display();
    }

?>