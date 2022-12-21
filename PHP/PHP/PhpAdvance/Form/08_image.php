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
        if(isset($_REQUEST["submit"])){
            if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"images/".$_FILES["myfile"]["name"])){
                echo "<h1>File uploaded successfuly";
                echo '<img src="images/1.jpg" alt="photo" height="100px">';
            } else{
                echo "Failed";
            }
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="myfile"><br><br>
            <input type="submit" value="Submit" name="submit"><br>
    </form>
</body>
</html>
    