<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    // Create Connection
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    // Check Connection
    if(!$conn){
        die("Connection Failed" . mysqli_connect_error());
    }
    echo "Connected Successfuly <hr>";

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Retrieve Data</title>
  </head>
  <body>
      <div class="container">
        <?php
            $sql = "select * from emp";         // No data in emp ,so it will run else part
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
                            echo "<td>". $row['id'] . "</td>";
                            echo "<td>". $row['name'] . "</td>";
                            echo "<td>". $row['roll'] . "</td>";
                            echo "<td>". $row['address'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                echo "</table>";
            } else {
                echo "0 Results";
            }
        ?>
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