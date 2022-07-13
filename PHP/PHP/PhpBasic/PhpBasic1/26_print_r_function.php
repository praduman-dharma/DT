<?php
    # The function is used to display information is a way that's redable by humans.
    # Syntax - print_r($array_name,Bool_Return);

    // Return can be True or False. By default there is False.
    // When Return is set to TRUE,print_r() will return the information rather than print it
    // It is generally use for cheking the indexing of array is correct or not.

    # Example 

    $name = array("Rahul","Sonam","Sumit","Rohan");

    // print_r($name);         // It will print information
    
    $results = print_r($name,TRUE); // When Return is set print_r() will return the
                                    // information rather than print it.
    echo $results;
?>