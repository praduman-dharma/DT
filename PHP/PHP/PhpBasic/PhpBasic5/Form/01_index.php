<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="02_index.php" method="post">
        Firstname : <input type="text" name="firstname" required><br><br>
        
        Lastname : <input type="text" name="lastname" ><br><br>
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
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>