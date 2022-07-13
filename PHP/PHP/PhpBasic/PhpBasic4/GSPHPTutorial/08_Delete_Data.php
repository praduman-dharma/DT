<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "test_db";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if(!$conn){
        echo "Connection Failed".mysqli_connect_error();
    } else{
        echo "Connected Successfuly <hr>";
    }

    // sql to Delete
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM student where id = {$_REQUEST['id']}";
        if(mysqli_query($conn,$sql)){
            echo "Record Deleted";
        } 
        else {
            "Error Unable to Delete";
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

    <title>Delete Data</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($conn,$sql);
                    if($row = mysqli_num_rows($result) > 0){
                        echo "<table class='table'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th> ID </th>";
                                    echo "<th> Name </th>";
                                    echo "<th> Roll </th>";
                                    echo "<th> Address </th>";
                                    echo "<th> Action </th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["roll"] . "</td>";
                                        echo "<td>" . $row["address"] . "</td>";
                                        echo '<td><form action="" method="post">
                                            <input type="hidden" name="id" value='. $row['id'].'><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete">
                                        </form></td>';
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
  </body>
</html>