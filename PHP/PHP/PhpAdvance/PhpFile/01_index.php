<?php
    // echo file_exists("myfile.txt");         // return 1 if file exists, empty if file not exists
    // readfile
    // $a = readfile("myfile.txt");
    // echo $a;

    $myfile = fopen("myfile.txt","r");
    // echo fread($myfile,filesize("myfile.txt"));             // Read whole file
    echo fgets($myfile);        // only reads first line of file
    echo fgetc($myfile);        // reads first letter of line
    fclose($myfile);

?>