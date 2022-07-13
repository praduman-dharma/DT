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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Registration Form
        </div>
        <div class="form">
            <form action="05_index.php" method="post">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" name="name" class="input">
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="input">
                </div>
                <div class="input_field">
                    <label>Email ID</label>
                    <input type="email" name="email" class="input">
                </div>
                <div class="input_field">
                    <label>Country</label>
                    <input type="text" name="country" value="India" class="input">
                </div>
                <div class="input_field">
                    <label>City</label>
                    <select name="location[]" multiple class="input">
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Kolkata">Kolkata</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Rajkot">Rajkot</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Area</label>
                    <input type="text" name="area" class="input">
                </div>
                <div class="input_field">
                    <label>Block</label>
                    <input type="text" name="block" class="input">
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" class="input">
                </div>
                <div class="input_field">
                    <label>Zip Code</label>
                    <input type="number" name="zip" class="input">
                </div>
                <div class="input_field">
                    <input type="submit" name="submit" class="btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php } ?>