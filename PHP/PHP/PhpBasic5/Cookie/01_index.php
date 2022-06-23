<?php
    // syntax 
    // setcookie(name,value,expire,path,domain,secure,httponly);

    // Creating Simple Cookie
    // setcookie("username","Praduman");

    // adding expire time
    // setcookie("username","Praduman",time() + 86400 * 1 );

    // Reading/accessing cookie
    // We can read/access/retrive cookies by $_COOKIE super global variable.
    // syntax - $_COOKIE["name"];

    // Example
    // echo $_COOKIE["username"];

    // Example 2
    // setcookie("cart","10");     // don't forget to write value in double quotes
    // echo $_COOKIE["cart"];

    // Replace//Append Cookies

    setcookie("username","Praduman");
    // setcookie("username","Rajan");      // Praduman replace by Rajan in username value

    // setcookie("userid","1011");         // append

    // echo $_COOKIE["username"];
    // echo $_COOKIE["userid"];

    // Deleting Cookie

    setcookie("username","Praduman", time()+ 86400*2);  // Creating cookie
    setcookie("username","Praduman", time()-3600);      // Deleting cookie
    



?>