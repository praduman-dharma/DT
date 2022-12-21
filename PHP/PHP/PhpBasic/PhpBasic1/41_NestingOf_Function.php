<?php
    # Nesting function - Function inside function
    function outer_display()
    {
        echo "I am Outer function <br>";
        function inner_display()
        {
            echo "I am Inner function <br>";
        }
    }

    outer_display();
    inner_display();

    // We can't call inner function without calling outer function.
    // First make call to outer then inner.
?>