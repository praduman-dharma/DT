<?php

// $handle = fopen("Paragraph.txt","r");
$handle = fopen("Text.txt","r");
// echo fgets($handle);     // It's only reads the first line.
                         // agar aapko ko dusra phir tishra line read karvana he to
                         // aapko loop use karna padega.

// feof($handle) >> jab file ke end me pahoch jayenge to ye function true return karega.

while(!feof($handle)){
    $data = fgets($handle);
    echo $data . "<br>";
}