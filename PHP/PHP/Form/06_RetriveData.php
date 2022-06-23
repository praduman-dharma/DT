<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Data in same page</title>
</head>
<body>
    <?php
        if(isset($_REQUEST["name"]) && isset($_REQUEST["roll"])){
            echo "<h1>Form Submitted</h1>";
            echo "Your Name is ". $_POST["name"] . "<br>";
            echo "Yur Roll Number is ". $_POST["roll"] . "<br>";
        } else {
    ?>
    <form action="" method="post">
        Name : <input type="text" name="name" required><br><br>
        Roll : <input type="text" name="roll" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php } ?>
</body>
</html>