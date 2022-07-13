<?php
    # for loop with Numeric array
    // $name = array("Rahul","Sonam","Sumit","Rohan");  # both array will work same

    $name[0] = "Rahul";
    $name[1] = "Sonam";
    $name[2] = "Sumit";
    $name[3] = "Rohan";

    // for ($i=0;$i<=3;$i++)
    // {
    //     echo "$name[$i] <br>";
    //     // echo $name[$i] . "<br>";        # both echo will work same
    // }

    for ($i=0;$i<count($name);$i++)         # you can use count() function,if don't know
                                            # how many elements store in your array.
    {
        // echo $name[$i] . "<br>";
        echo "\$name[$i] = " .$name[$i] . "<br>";  # for better underdstaning 
    }

    
?>