<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # we can't use GET,POST,REQUEST for accessing files
        # For accessing files we use Super Global variable $_FILES,
        # print_r show the indexing of data
        # Print_r return human-readable information about a variable

        // print_r($_FILES["myfile"]);            # It will show key/value pairs of array in 
        //                                        # 2 dimension array

        // echo $_FILES["myfile"]["name"];
        // echo $_FILES["myfile"]["type"];
        // echo $_FILES["myfile"]["tmp_name"];
        // echo $_FILES["myfile"]["error"];
        // echo $_FILES["myfile"]["size"];

        # for saving file we use move_upload_file()
        # This function move tempory file and save the file in new location. 

        // "images/".$_FILES["myfile"]["name"] - it save the file in images folder with  
        //same file name

        // move_uploaded_file($_FILES["myfile"]["tmp_name"],"images/".$_FILES["myfile"]["name"]);

        # for showing something on screen after uploding file use if like below
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"],"images/" . $_FILES["myfile"]
        ["name"])){
            echo "Uploaded Successfully";
        } else {
            echo "Failed";
        }
    ?>
</body>
</html>