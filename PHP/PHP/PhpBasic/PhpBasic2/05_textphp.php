<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Example 1 -->
     <!-- php inside html -->

    <!-- <span>Your Password is:</span> <span style="color:red;">
        <?php // echo $_REQUEST["pass"];?>
    </span> -->

    <?php
    // html inside php
    //    echo "<span>Your password is:</span>" . "<b>" . $_REQUEST['pass'] . "</b>";
    ?>

    <!-- Example 2 - Login system - IMPORTANT--> 
    <?php
        // html inside php
        // if($_REQUEST["pass"] == "Hello")
        // {
        //     echo "Login Successfully ";
        // }
        // else
        // {
        //     echo "You have entered wrong Password:" . $_REQUEST["pass"];
        // }
    ?>

    <!-- Php inside php -->
    <?php
     if($_REQUEST["pass"] == "Hello")
     { ?>
        <h1> Login Successfully</h1>
    <?php } else {  ?>
        <span>You have entered wrong password : </span> <?php echo $_REQUEST["pass"] ?>
    <?php } ?>


</body>
</html>