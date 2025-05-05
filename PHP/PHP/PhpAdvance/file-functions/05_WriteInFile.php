<?php
    // If you use fopen() on a file that does not exist, it will create it, given that the file is opened for writing (w) or appending (a).

    // $myfile = fopen("testfile.txt","w");


    //  The fwrite() function is used to write to a file.

    // The first parameter of fwrite() contains the name of the file to write to and the second parameter is the string to be written.
 

    $myfile = fopen("testfile.txt","w");

    $txt = "Hello World\n";
    fwrite($myfile,$txt);

    $txt = "Bye World\n";
    fwrite($myfile,$txt);

    fclose($myfile);

?>

<?php

    // PHP Overwriting
    // Now that "newfile.txt" contains some data we can show what happens when we open an existing file for writing. All the existing data will be ERASED and we start with an empty file.

    $myfile = fopen("testfile.txt","w");

    $txt = "Mickey Mouse\n";
    fwrite($myfile,$txt);
    
    $txt = "Mickey Mouse\n";
    fwrite($myfile,$txt);

    fclose($myfile);

?>


<?php
    // The copy() function copies a file.
    // Note: If the to_file file already exists, it will be overwritten.
    // echo copy("myfile.txt","target.txt");
?>

<?php
    // There is no delete() function in PHP.
    // If you need to delete a file, look at the unlink() function.

    $file = fopen("test.txt","w");
    echo fwrite($file,"Hello World. Testing!");
    fclose($file);

    unlink("test.txt");             // This will delete test.txt file 

?>