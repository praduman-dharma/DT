<?php
    // Normal way
    /*
    if(isset($_REQUEST["submit"]) && isset($_FILES["my_image"])){
        include "db_conn.php";

        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $gender = $_REQUEST["gender"];
        $country = $_REQUEST["country"];
        $pass = $_REQUEST["pass"];
        $role = $_REQUEST["role"];


        $img_name = $_FILES["my_image"]["name"];
        $img_size = $_FILES["my_image"]["size"];
        $tmp_name = $_FILES["my_image"]["tmp_name"];
        $error = $_FILES["my_image"]["error"];

        if($error === 0){
            if ((empty($name)) || (empty($email)) || (empty($gender))|| (empty($country)) ||
            (empty($pass)) || ($img_size > 925000)) {
                $em = "Sorry, your file is too large.";
                header("Location: create.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc,$allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'. $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    $sql = "INSERT INTO `form`(name,email,gender,image_url,country,pass,role) values('$name','$email','$gender','$new_img_name','$country','$pass','$role')";
                    mysqli_query($conn,$sql);
                    echo "Uploaded Successfuly";
                    header("Location: admin.php");

                } else {
                    $em = "You can't upload files of this type";
                    header("Location: create.php?error=$em");
                }
            }
        } else {
            $em = "unknown error occurred!";
            header("Location: create.php?error=$em");
        }


    } else {
        header("Location: index.php");
        echo "Error";
    }

    */

    // insert using function

    include("function.php");
    upload();
?>