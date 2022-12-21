<?php
    // Array - Collection of data Items.

    // Types of Array
    // 1.Numeric/Indexed Array - In this arry index will be represented by a number.By
    //                           default numeric array index start from 0
    # Example - $num[0] = "Praduman";

    // 2.Associative Array     - In this Array index/key will be represented by a string.
    # Example - $num["Price"] = 500;

    // 3.Multidimensional Array - Arrays of Arrays is known as multidimesional Arrays.

    # Decalration and Initilization of Array

    // Syntax
        // $array_name [0] = value;

    # Example 1
        // $name[0] = "Praduman";
        // $num[0] = 25;

    # Example 2 - Example 1 return in another format
        // $name[]  = "GeekyShows";
        // $num[]  = 25;

    # Note - By default, array starts with index 0;

    # Example 3 
    $num [] = 25;
    // echo $num [0];  # We have to write indexed value while printing echo.
                    # if you write this echo $num [] ,it will show you error.
    // echo "Value is $num[0]";     // don't write $num [0]; in this format.
    // echo "Value is ".$num[0];    // This 3 echo will work same.
    // echo "Value is ",$num[0];
    

    // $name [0] = "Praduman";       #  $name [] = "Praduman"; you can skip index value
    // $name [1] = "Rajan";
    // $name [2] = "Sumit";
    // $name [3] = "Rahul";
    // echo $name[0];
    // echo $name[1];
    // echo $name[2];
    // echo $name[3];


?>  