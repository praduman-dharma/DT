<?php
    $cookie_name = "user_email";
    if(isset($_REQUEST["set"])){
        $cookie_value = $_REQUEST["email"];
        $cookie_expire = time() + 86400 * 1;
        setcookie($cookie_name,$cookie_value,$cookie_expire);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cookies</h1>
    <form action="" name="myform" method="post">
        Email: <input type="email" name="email" required>
        <input type="submit" value="Submit" name="set">
    </form>
    <hr>
    <?php
        if(isset($_COOKIE[$cookie_name])){
            echo " Cookie Name is" . $cookie_name ." and Value is ". $_COOKIE[$cookie_value] . "<br>";
        }
    ?>
</body>
</html>