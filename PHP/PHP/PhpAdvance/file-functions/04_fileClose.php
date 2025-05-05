<?php

## fclose()

// fclose() function isused to close an open file. Closing the file frees up the resources connected with that file.

// This function returns True if the file was closed successfully and False otherwise.

// Syntax : fclose($file_handle);
// Ex : fclose($handle);

$handle = fopen("Text.txt","r");

while(!feof($handle)){
    $data = fgets($handle);
    echo $data . "<br>";
}


// fclose($handle);

$file = fclose($handle);
if($file){
    echo "File Closed";
}
