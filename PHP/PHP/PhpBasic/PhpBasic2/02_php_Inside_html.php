<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Php inside Html</h1>
    <input type="range">
    <p style="color:red;">
        <?php
            echo "Hello GeekyShows";
        ?>
    </p>
    <p style="color:red;"><?php echo "Hello GeekyShows";?></p>   <!-- Write in single line -->
    
</body>
</html>