<?php
    if(isset($_POST["submit"])){
        echo "Date of Birth :";
        $new_date = date("d-m-Y",strtotime($_REQUEST["d"]));
        echo $new_date;
    } else { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="" method="post">
        Date of Birth<input type="date" name="d" value=" <?php date(d-m-Y) ?>">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php } ?>

