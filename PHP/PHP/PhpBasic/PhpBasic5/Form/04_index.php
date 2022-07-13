<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Email ID : <input type="email" name="email"><br>
    <input type="submit" name="submit">
    </form>

    <?php 
        if(isset($_REQUEST["submit"])){
        $email = $_REQUEST["email"];

        // Validate empty or email
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red'>Error: Please provide a valid email address</p>";
        } else { 
            echo "<br> Email ID:". $email;
        }
    }
    ?>
</body>
</html>