<?php
    # Example 1
    // function add($a,$b)
    // {
    //     return($a + $b);
    // }
    // // add(2,4);
    // echo add(2,4);       // Return function ,return the value show you have to print it 
                            // using echo or assign return value to variable

    # Inhance version of Example 1
    function add($a,$b)
    {
        $sum = $a +$b;
        return($sum);
    }
    // echo add(2,4);
    $a = add(4,6);
    echo $a;

?>