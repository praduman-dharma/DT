<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["submitted"])){
            if(!isset($_POST["agree"])){
                echo "<p> You have not accepted our terms of service</p>";
            } else {
                echo "<h2>Thank you " . $_POST["firstname"] . "</h2>";
                echo "<p> You have been registered as </p>" . $_POST["firstname"] . " " . $_POST["lastname"];

                // echo "<p> Go <a href='/PHP/Form/07_registration_form2.php'>back</a> to the form</p>";
            }
        } else {
    ?>
    <h2>Registration Form</h2>
    <form action="" method="post">
        First name: <input type="text" name="firstname"><br><br>
        Last name: <input type="text" name="lastname"><br><br>
        Agree to Terms of Service:
        <input type="checkbox" name="agree"><br>
        <input type="hidden" name="submitted" value="1"><br>
        <input type="submit" value="Submit">
    </form>
    <?php } ?>
</body>
</html>