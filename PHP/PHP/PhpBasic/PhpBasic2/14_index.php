<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Form Data in same page</title>
</head>
<body>
    <!-- action = "" blank means same page me data retrieve hoga -->
    <?php
    if(isset($_POST["name"]) && isset($_POST["roll"])){
        echo "<h1>Form Submitted</h1>";
        echo "Your Name is " . $_POST["name"] ."<br>";
        echo "Your Roll Number is ". $_POST["roll"] ."<br>";
    } else { 
    ?> 

    <form action="" method="post">
        Name :<input type="text" name="name"><br><br>
        Roll : <input type="text" name="roll">
        <input type="submit" value="Submit">      <!--When you Submit data,a page will load again-->
    </form>
    <?php } ?>
</body>
</html>