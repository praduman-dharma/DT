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

    echo "Connection Successfully <hr>";

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
            <div class="col-sm-12">
                <?php
                    $sql = "select * from student";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){ ?>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Roll </th>
                                    <th> Address </th>
                                </tr>
                            </thead>
                            <tbody><?php
                                while($row = $result->fetch_assoc()){ ?>
                                    <tr>
                                        <td class="data"><?=$row['id']?></td>
                                        <td  class="data"><?=$row['name']?></td>
                                        <td class="data"><?=$row['roll']?></td>
                                        <td class="data"><?=$row['address']?></td>
                                    </tr>
                            <?php   }  ?>
                             </tbody>
                        </table>
                        <!-- <button type="submit" class="btn btn-warning" name="view"><a href="index.php">Back</a></button> -->
                <?php    } else {
                        echo "0 Results";
                        }
                        ?>  
            </div>
        </div>
    </div>
    <?php $conn->close(); ?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>