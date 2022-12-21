<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- <span>Your password is: </span> 
    <span style="color:red"><?php echo $_POST["pass"] ?></span> -->

    <?php
        // echo "Your password is:" . "<span style='color:red'>" . $_POST['pass'] ."</span>";
        if($_POST["pass"] == "Hello"){
            echo "<h1 style='color:green'>Login Succesfully</h1>";
        } else {
            echo "<h1>You entered wrong password:"."<span style='color:red'>". $_POST["pass"]."</span></h1>";
        }
    ?>

    

</body>
</html>