<?php
    include "db_conn.php";

    if(isset($_REQUEST["update"])){
        if(($_REQUEST["name"] == "") || ($_REQUEST["roll"] == "") || ($_REQUEST["address"] == "")){
            echo "<samll style='color:red'>Fill All Fields</small>";
        } 
        else {
            $name = $_REQUEST["name"];
            $roll = $_REQUEST["roll"];
            $address = $_REQUEST["address"];

            $sql = "update emp set name = '$name', roll = '$roll', address = '$address' where id = {$_REQUEST['id']}";
            if(mysqli_query($conn,$sql)){
                echo "Updated";
            } 
            else {
                echo "Not Updated";
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
    <style>
        a{
            text-decoration: none;
            color:white;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <?php
                    if(isset($_REQUEST['edit'])){
                        $sql = "select * from emp where id = {$_REQUEST['id']}";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                        value="<?php if(isset($row['name'])){ echo $row['name'];} ?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="roll">Roll</label>
                        <input type="text" class="form-control" name="roll" id="name"
                        value="<?php if(isset($row['roll'])){ echo $row['roll'];} ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="name"
                        value="<?php if(isset($row['address'])){ echo $row['address'];} ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                    <button type="submit" class="btn btn-warning" name="view"><a href="view.php">View</a></button>
                </form>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>