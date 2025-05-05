<?php

// $handle = fopen("text.txt","r");             // Open Text file
// $handle = fopen("C:\wamp64\www\phpFilesFunction\Text.txt","r");  // Open File from another directory
// $handle = fopen("https://www.google.com","r");  // Open Url 

// if($handle){
//     echo "File Opened";
// } else {
//     echo "File Not Opened";
// }

// You can also use die() Function while opening a file so if for any reason file can't be open the application will be quite.

$handle = fopen("Text.txt","r") or die("Cant Open"); // die function ke bad ka code execute run nahi hota he.
