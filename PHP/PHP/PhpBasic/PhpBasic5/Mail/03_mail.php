<?php
$to_email = "pradhyuman.dharmatechnolabs@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: pradhyuman.dharmatechnolabs@gmail.com";
// echo "hello";
if (mail($to_email, $subject, $body, $headers)) {
    // echo "hello";
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}