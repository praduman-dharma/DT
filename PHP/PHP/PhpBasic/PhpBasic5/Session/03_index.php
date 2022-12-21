<?php
    session_start();

    echo $_SESSION["favcolor"];         // Accessing data of session variable

    // print_r($_SESSION);         //  It will show all the session variable values

    // to change a session variable, just overwrite it
    $_SESSION["favcolor"] = "Blue";

    print_r($_SESSION);

?>