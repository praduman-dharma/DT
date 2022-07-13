<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Submitted</h1>
    <?php

        // IMPORTANT - First run 03_Form.html file ,it will run automatically 
        // If you run this file first,browser so you Undefined error

        // if you submitted the data using method GET,use this for Accessing data

        // echo $_GET["username"];
        // echo $_GET["pass"];

        // if you submitted the data using method POST,use this for Accessing data
        
        // echo $_POST["username"];
        // echo $_POST["pass"];
        
        // if you submitted the data using method POST OR method GET you can  Access that
        // data by $_REQUEST 

        echo $_REQUEST["username"];
        echo $_REQUEST["pass"];


    ?>
</body>
</html>