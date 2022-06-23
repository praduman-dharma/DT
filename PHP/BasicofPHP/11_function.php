<?php
    /*
    function display()
    {
        echo "Welcome to GeekyShows <br>";
    }

    display();
    */

    // Default argument
    /*
    function display($name1,$name2,$name3= "Parth")
    {
        echo "$name1 to $name2 $name3 <br>";
    }
    display("Rahul","Ranjeet","Ritesh");
    */

    // Example of Default argument
    /*
    function display($name,$phone,$address = Null)
    {
        if($address == NULL)
        {
            echo "Sorry Data Not Found";
        }
        else{
            echo "Your name is $name and Your Number is $phone";
        }
    }

    display("Rahul",78910,"India");
    */

    // Return Statement
    function add($a,$b)
    {
        return($a + $b);
    }
    $a = add(4,6);
    echo $a;

?>