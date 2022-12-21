<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Accessing data outside php - don't forget to write echo before $_POST["name"]; -->   
    <!-- <span>Your name is:</span> <span style='color:red;'> <?php echo $_POST["name"]; ?>
    </span>       -->
    <span style="color:red;">Your Name is:</span> <span style="color:blue;"><?php echo $_POST["name"]; ?> </span>



    <?php
        // Accessing data inside php
        // echo "Your name is : " . $_POST["name"];
        // echo "Your name is : " . $_REQUEST["name"];  // You can access post data by both > post and request method

        // echo "Your name is : " . "<span style='color:red;'>" .$_POST["name"] ."</span>";
  
    ?>
</body>
</html>