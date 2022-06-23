<?php
    // Send an email with extra headers:
    // $to = "ppraduman6@gmail.com";
    // $subject = "My subject";
    // $txt = "Hello world!";
    // $headers = "From: pradhyuman.dharmatechnolabs@gmail.com" . "\r\n" .
    // "CC: pandeypraduman07@gmail.com";
    
    // mail($to,$subject,$txt,$headers);

    $to_email = 'ppraduman6@gmail.com';
    $subject = 'Testing PHP Mail';
    $message = 'This mail is sent using the PHP mail function';
    mail($to_email,$subject,$message);
    

?>