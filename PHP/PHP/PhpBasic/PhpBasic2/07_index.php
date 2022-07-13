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
    echo "You Selected: <br>";
        if(isset($_REQUEST["check1"])){
            echo $_REQUEST["check1"] ."<br>";
        }
        if(isset($_REQUEST["check2"])){
            echo $_REQUEST["check2"] ."<br>";
        }
        if(isset($_REQUEST["check3"])){
            echo $_REQUEST["check3"] ."<br>";
        }
    ?>
</body>
</html>