<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    // Create Connection
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);
    
    // Check Connection
    if(!$conn){
        die("Connection Failed").mysqli_connect_error();
    } else {
        echo "Connection Succesfuly<hr>";
    }

    if(isset($_REQUEST["submit"])){
        if(($_REQUEST["name"] == "") || ($_REQUEST["roll"] == "") || ($_REQUEST["address"] == "")){
            echo "<samll style='color:red'>Fill All Fields</small>";
        } 
        else {
            $name = $_REQUEST["name"];
            $roll = $_REQUEST["roll"];
            $address = $_REQUEST["address"];

            $sql = "INSERT INTO student(name,roll,address) VALUES ('$name','$roll','$address')";
            if(mysqli_query($conn,$sql)){
                echo "New Record Inserted Successfully";
            } 
            else {
                echo "Unable to Insert".mysqli_query_error();
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="roll">Roll</label>
                        <input type="text" class="form-control" name="roll" id="name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="name">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            <div class="col-sm-6 offset-sm-2">
                <?php
                    $sql = "select * from student";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        echo "<table class='table'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th> ID </th>";
                                    echo "<th> Name </th>";
                                    echo "<th> Roll </th>";
                                    echo "<th> Address </th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>". $row["id"] . "</td>";
                                    echo "<td>". $row["name"] . "</td>";
                                    echo "<td>". $row["roll"] . "</td>";
                                    echo "<td>". $row["address"] . "</td>";
                                    echo "</tr>";
                                } 
                             echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "0 Results";
                        }
                        ?>
                        
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>