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
    <?php if(isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="upload.php" method="post" enctype="multipart/form-data">
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

                    <div class="form-group mb-3">
                        <label for="file"></label>
                        <input type="file" class="form-control" name="my_image" id="name">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>