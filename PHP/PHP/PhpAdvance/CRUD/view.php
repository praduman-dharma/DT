<?php include "db_conn.php"; ?>
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
        img{
            width:100px;
        }
        td.data {
            padding: 27px 0px;
        }
        a{
            text-decoration: none;
            color:white;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php 
                    if(isset($_REQUEST["delete"])){
                        $sql = "select * from emp where id={$_REQUEST['id']}";
                        $result = mysqli_query($conn,$sql);
                        if($row = mysqli_fetch_assoc($result)){
                            unlink("uploads/".$row['image_url']);
                        }
                        $sql = "Delete from emp where id= {$_REQUEST['id']}";
                        if(mysqli_query($conn,$sql)){
                            // echo "Record Deleted";
                        } else {
                            echo "Unable to Delete";
                        }
                    }
                ?>
                <?php
                    $sql = "select * from emp";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){ ?>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Roll </th>
                                    <th> Address </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody><?php
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td class="data"><?=$row['id']?></td>
                                        <td><img src="uploads/<?=$row['image_url']?>"></td>
                                        <td  class="data"><?=$row['name']?></td>
                                        <td class="data"><?=$row['roll']?></td>
                                        <td class="data"><?=$row['address']?></td>
                                        <td class="data"><form action="01_update.php" method="post">
                                                <input type="hidden" name="id" value="<?=$row['id']?>"><input type="submit" class="btn btn-sm btn-warning" name="edit" value="Edit">
                                            </form></td>
                                        <td class="data"><form action="" method="post">
                                            <input type="hidden" name="id" value="<?=$row['id']?>"><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete">
                                        </form></td>
                                    </tr>
                            <?php   }  ?>
                             </tbody>
                        </table>
                        <button type="submit" class="btn btn-warning" name="view"><a href="index.php">Back</a></button>
                <?php    } else {
                        echo "0 Results";
                        }
                        ?>
                        
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>