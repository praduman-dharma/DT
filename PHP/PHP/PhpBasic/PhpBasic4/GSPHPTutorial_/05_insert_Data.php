<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    // Create Connection
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name);

    // Check Connection
    if($conn->connect_error){
        die("Connection Failed");
    }

    echo "Connection Successfuly <hr>";

    // Insert 

    if(isset($_REQUEST["submit"])){
        // Checking for empty fields
        if(($_REQUEST["name"] == "") || ($_REQUEST["roll"] == "") || ($_REQUEST["address"] == "")){
            echo "<small style='color:red'>Fill All Fields...<hr></small>";
        } else {
            $name = $_REQUEST["name"];
            $roll = $_REQUEST["roll"];
            $address = $_REQUEST["address"];

            $sql = "insert into student (name,roll,address) values ('$name', '$roll', '$address')";
            if($conn->query($sql) === TRUE){
                echo "Record Inserted Successfuly";
            } else {
                echo "Unable to Insert Data";
            }
        }
    }


    // public function insert(Type $var = null)
    // {
    //     # code...
    // }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Simple Form</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" 
                        id="name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="roll">Roll</label>
                        <input type="text" class="form-control" name="roll"
                        id="roll">
                    </div>

                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address"
                        id="roll" >
                    </div>
                    <button type="submit" class="btn btn-primary" 
                    name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>