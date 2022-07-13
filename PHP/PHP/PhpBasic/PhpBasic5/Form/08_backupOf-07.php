<?php
       if(isset($_REQUEST["submit"])){
        $name = "firstname";
        $cookie_value = $_REQUEST["name"];
        setcookie($name,$cookie_value,time()+ 86400*1);
        if(empty($_COOKIE[$name]) || (!preg_match ("/^[a-zA-z]*$/", $_COOKIE[$name]) ) || (strlen($_COOKIE[$name]) < 8)){
            echo "<p style='color:red'>Error: Name requires a minimum of 8 characters and characters only</p>";
        } else {
            echo "Firstname : ". $_COOKIE[$name] . "<br>";
        }

        $name = "lastname";
        $cookie_value = $_REQUEST["lastname"];
        setcookie($name,$cookie_value,time()+ 86400*1);
        if(empty($_COOKIE[$name]) || (!preg_match ("/^[a-zA-z]*$/", $_COOKIE[$name]) )){
            echo "<p style='color:red'>Error: Lastname requires characters only</p>";
        } else {
            echo "Lastname : ". $_COOKIE[$name] ."<br>";
        }

        $name = "email";
        $cookie_value = $_REQUEST["email"];
        $cookie_expire = time() + 86400*1;
        setcookie($name,$cookie_value,$cookie_expire);

        if(empty($_COOKIE[$name]) || (!filter_var($_COOKIE[$name], FILTER_VALIDATE_EMAIL))){
            echo "<p style='color:red'>Error: Please provide a valid email address</p>";
        } else { 
            echo "<br> Email ID:". $_COOKIE[$name] ."<br>";
        }

        $name = "country";
        $cookie_value = $_REQUEST["country"];
        
        setcookie($name,$cookie_value,$cookie_expire);

        if(empty($_COOKIE[$name]) || (!preg_match ("/^[a-zA-z]*$/", $_COOKIE[$name]) )){
            echo "<p style='color:red'>Error: Please provide a valid Country name</p>";
        } else {
            echo "Country:".$_COOKIE[$name]."<br>";
        }

        $name = "city";
        if(isset($_REQUEST["location"])){
            foreach($_REQUEST["location"] as $place){
                $cookie_value = $place;
            }
            setcookie($name,$cookie_value,$cookie_expire);
            echo "City : " . $_COOKIE[$name] . "<br>";
        } else {
            echo "<p style='color:red'>Please Select your City.<p><br>";
        }

        

        $name = "area";
        $cookie_value = $_REQUEST["area"];
        
        setcookie($name,$cookie_value,$cookie_expire);

        if(empty($_COOKIE[$name]) || (!preg_match ("/^[a-zA-z]*$/", $_COOKIE[$name]) )){
            echo "<p style='color:red'>Error: Area name in characters</p>";
        } else {
            echo "Area : ". $_COOKIE[$name] . "<br>";
        }


        $name = "block";
        $cookie_value = $_REQUEST["block"];

        setcookie($name,$cookie_value,$cookie_expire);

        if(empty($_COOKIE[$name]) || (!preg_match ("/^[0-9]*$/", $_COOKIE[$name]) )){
            echo "<p style='color:red'>Error: Block number in number</p>";
        } else {
            echo "Block : ". $_COOKIE[$name] . "<br>";
        }

        $name = "phone";
        $cookie_value = $_REQUEST["phone"];

        setcookie($name,$cookie_value,$cookie_expire);

        if(empty($_COOKIE[$name]) || strlen($_COOKIE[$name]) < 10 || 
        (!preg_match ("/^[0-9]*$/", $_COOKIE[$name]) ) ){
            echo "<p style='color:red'>Error: Phone Number requires a 10 digit.</p>";
        } else {
            echo "Phone : ". $_COOKIE[$name] . "<br>";
        }

        $name = "zip";
        $cookie_value = $_REQUEST["zip"];

        setcookie($name,$cookie_value,$cookie_expire);

        if(empty($_COOKIE[$name]) || (!preg_match ("/^[0-9]*$/", $_COOKIE[$name]) )){
            echo "<p style='color:red'>Error: Zip Code number in number</p>";
        } else {
            echo "Zip Code : ". $_COOKIE[$name] . "<br>";
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
            <form action="" method="post">
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