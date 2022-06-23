<?php

    // Definition and Usage
    // The mail() function allows you to send emails directly from a script.

    // Syntax
    // mail(to,subject,message,headers,parameters);


    // Send a simple email:
    $msg = "First line of text\nsecond line of text";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail("someone@example.com","My subject",$msg);


    // This file show you error
?>