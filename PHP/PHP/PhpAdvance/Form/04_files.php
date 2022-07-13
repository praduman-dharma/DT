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
        // print_r($_FILES["myfile"]);

        // echo $_FILES["myfile"]["name"];
        // echo $_FILES["myfile"]["type"];
        // echo $_FILES["myfile"]["tmp_name"];
        // echo $_FILES["myfile"]["error"];
        // echo $_FILES["myfile"]["size"];

        if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"images/".$_FILES["myfile"]["name"])){
            echo "<h1>File uploaded successfully</h1>";
        }
        else {
            echo "Failed";
        }
    ?>
</body>
</html>