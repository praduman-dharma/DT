<?php
    # Super Globals Variable
    // $GLOBALS  - ye ek array he, jo ki har ek global variable ko store karke rakhta he k
    // apne index me store karta he

    $a = 10;
    $b = 20;

    function display()
    {
        echo $GLOBALS['a'] ."<br>";          # With $GLOBALS keyword we can use variable in 
                                             # other file
        echo $GLOBALS['b']; 
    }

    display();

    // Name of Super Global Variables
    # $GLOBALS
    # $_SERVER
    # $_REQUEST
    # $_POST
    # $_GET
    # $_FILES
    # $_ENV
    # $_COOKIE
    # $_SESSION
?>