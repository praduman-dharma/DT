<?php

    // What is a Regular Expression?
    // A regular expression is a sequence of characters that forms a search pattern. When you search for data in a text, you can use this search pattern to describe what you are searching for.

    // A regular expression can be a single character, or a more complicated pattern.

    // Regular expressions can be used to perform all types of text search and text replace operations.

    /*

    Regular Expression Functions
    PHP provides a variety of functions that allow you to use regular expressions. The preg_match(), preg_match_all() and preg_replace() functions are some of the most commonly used ones:

    Function	Description
    preg_match()	Returns 1 if the pattern was found in the string and 0 if not
    preg_match_all()	Returns the number of times the pattern was found in the string, which may also be 0
    preg_replace()	Returns a new string where matched patterns have been replaced with another string

    */
    

?>

<!DOCTYPE html>
<html>
<body>

<?php
// The preg_match() function will tell you whether a string contains matches of a pattern.
$str = "Visit W3Schools";
$pattern = "/w3schools/i";
// echo preg_match($pattern, $str); 
?>

</body>
</html>

<?php
    /*
    The preg_match_all() function will tell you how many matches were found for a pattern in a string.

    Example
    Use a regular expression to do a case-insensitive count of the number of occurrences of "ain" in a string:
    */

    $str = "The rain in SPAIN falls mainly on the plains.";
    $pattern = "/ain/i";
    // echo preg_match_all($pattern,$str);
?>

<?php

    /*
    The preg_replace() function will replace all of the matches of the pattern in a string with another string.

    Example
    Use a case-insensitive regular expression to replace Microsoft with W3Schools in a string:

    */

    $str = "Visit Microsoft!";
    $pattern = "/microsoft/i";
    echo preg_replace($pattern,"W3Schools",$str);


?>