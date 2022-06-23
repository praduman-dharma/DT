<?php
    if(isset($_REQUEST["submit"])){
    $name = $_REQUEST["name"];

    if(empty($name) || strlen($name) < 8 || (!preg_match ("/^[a-zA-z]*$/", $name) )){
        echo "<p style='color:red'>Error: Name requires a minimum of 8 characters and characters only</p>";
    } else {
        echo "Name:".$name ."<br>";
    }

    $lastname = $_REQUEST["lastname"];
    if(empty($lastname) || (!preg_match ("/^[a-zA-z]*$/", $lastname) )){
        echo "<p style='color:red'>Error: Lastname characters only</p>";
    } else {
        echo "Lastname:".$lastname."<br>";
    }

    $email = $_REQUEST["email"];

    // Validate empty or email
    
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red'>Error: Please provide a valid email address</p>";
    } else { 
        echo "<br> Email ID:". $email ."<br>";
    }

    echo "Country:".$_REQUEST["country"] ."<br>";

    if(isset($_REQUEST["location"])){
        foreach($_REQUEST["location"] as $place){
            echo "City:".$place ."<br>";
        }
    }

    $area = $_REQUEST["area"];
    if(empty($area) || (!preg_match ("/^[a-zA-z]*$/", $area) )){
        echo "<p style='color:red'>Error: Area name in characters</p>";
    } else {
        echo "Area:".$area."<br>";
    }

    $block = $_REQUEST["block"];
    if(empty($block) || (!preg_match ("/^[0-9]*$/", $block) )){
        echo "<p style='color:red'>Error: Block number in number</p>";
    } else {
        echo "Block:".$block."<br>";
    }

    $phone = $_REQUEST["phone"];

    if(empty($phone) || strlen($phone) < 10 || (!preg_match ("/^[0-9]*$/", $phone) )){
        echo "<p style='color:red'>Error: Phone Number requires a 10 digit.</p>";
    } else {
        echo "Phone:" .$phone ."<br>";
    }

    $zip = $_REQUEST["zip"];
    if(empty($block) || (!preg_match ("/^[0-9]*$/", $zip) )){
        echo "<p style='color:red'>Error: Zip Code number in number</p>";
    } else {
        echo "Zip Code:".$zip ."<br>";
    }

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
    <form action="05_index.php">
        Name : <input type="text" name="name"><br><br>
        Lastname : <input type="text" name="lastname" ><br><br>
        Email ID: <input type="email" name="email"><br><br>
        Country : <input type="text" name="country" value="India"><br><br>
        City <br>
        <select name="location[]" multiple>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Rajkot">Rajkot</option>
        </select><br><br>
        Area : <input type="text" name="area"><br><br>
        Block : <input type="text" name="block"><br><br>
        Phone Number : <input type="tel" name="phone">
        <br><br>
        Zip Code : <input type="number" name="zip"><br><br>
    <input type="submit" name="submit">
    </form>
</body>
</html>

<?php } ?>