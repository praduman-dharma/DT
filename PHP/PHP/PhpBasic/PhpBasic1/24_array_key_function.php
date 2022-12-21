<?php
    # array key() Function - The array_keys() function returns an array containing the keys.
    // syntax - array_keys(array,value,strict)

    // $fees = array("Rahul" => 500,"Sonam" => 300, "Sumit" => 600);
    // $keys = array_keys($fees);   # it will copy the $fees array
                                    # $keys array store value like below
                                            // $keys[0] = "Rahul";
                                            // $keys[1] = "Sonam";
                                            // $keys[2] = "Sumit";
    // echo $keys[0] ."<br>";

    # printing value of array by using function
    // for($i=0;$i<count($keys);$i++)
    // {
    //     echo $keys[$i] ."<br>";
    // }

    // $keys = array_keys($fees,500);   # it will return only which key whose value is 500 
    // echo $keys[0];


     # for loop with Associative array

     $fees = array("Rahul" => 500, "Sonam" => 300, "Sumit" => 600);
     $keys = array_keys($fees);
     
    //  echo $fees["Rahul"];       # for printing the value of Rahul we use this
    //  echo $fees[$keys[0]];      # it will become like this echo $fees[Rahul];
                                   # this will also print the value of Rahul

    //  for ($i=0;$i<count($keys);$i++)
    //  {
    //      echo $keys[$i] ." = ". $fees[$keys[$i]] ."<br>";
    //  }

        # echo $keys[$i]   - it will access the keys of element
        # $fees[$keys[$i]] - it will access the value of element
?>
