<?php
    # Normal Function

    // function display()              
    // {
    //     echo "Welcome to GeekyShows";       
    // }

    // display();              # calling function

    # Example 2

    // echo "First line <br>";
    // display();                 # you can call function before declaring    
    //                            # but  there is some function to define first than call 
    // echo "Second line <br>";
    // function display()
    // {
    //     echo "Welcome to GeekyShows <br>";
    // }

    // display();
    // echo "Last line <br>";

    # function with no parameter

    // function display()               // No parameter 
    // {
    //     echo "Welcome to GeekyShows";       
    // }

    // display();                       // No argument

    # Function with parameter

    // function display($name1, $name2)    # $name1 ="Welcome"  ,$name2 = "GeekyShows"
    // {
    //     echo "$name1 to $name2  <br>";
    // }
    // display("Welcome","GeekyShows");
    // display("Welcome","Google");


    # Default Argument

    // function display($name1,$name2,$name3 = "GeekyShows")
    // {
    //     echo "$name1 to $name2 $name3 ";
    // }

    // display("Welcome","Your");
    // display("Welcome","Your","PHP");
    // display("Welcome");                 // It will show you error


    # Example of Default Argument

    // function display($name,$phone,$address = "INDIA")
    // {
    //     echo "$name $phone $address <br>";
    // }
    // display("Praduman",1234567);
    // display("John",7654321,"USA");

    # Example

    function display($name,$phone,$address = NULL)
    {
        if ($address == NULL)
        {
            echo "Sorry Data Not Found";
        }
        else
        {
            echo "Your name is $name and Your Number is $phone";
        }
    }
    // display("Raj","78910");
    display("Raj","78910","INDIA");



    

?>