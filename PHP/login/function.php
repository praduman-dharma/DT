<?php
    function upload(){
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
            header("Location: create.php");
            echo "Error";
        }
    }

    function userInsert(){
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
                    header("Location: NewAcc.php?error=$em");
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
                        header("Location: index.php");
    
                    } else {
                        $em = "You can't upload files of this type";
                        header("Location: NewAcc.php?error=$em");
                    }
                }
            } else {
                $em = "unknown error occurred!";
                header("Location: NewAcc.php?error=$em");
            }
    
    
        } else {
            header("Location: index.php");
            echo "Error";
        }
    }

    function delete(){
        if(isset($_REQUEST["delete"])){
            include("db_conn.php");
            $sql = "SELECT * from `form` where id={$_REQUEST['id']}";
            $result = mysqli_query($conn,$sql);
            if($row = mysqli_fetch_assoc($result)){
                unlink("uploads/".$row['image_url']);
            }
            $sql = "Delete from `form` where id={$_REQUEST['id']}";
            if(mysqli_query($conn,$sql)){
                // echo "Record Deleted";
            } else {
                echo "Unable to Delete";
            }
        }
    }

    function Edit(){
        if (isset($_REQUEST["update"]) && isset($_FILES["my_image"])) {
            include "db_conn.php";
        
            $sql = "select * from `form` where id={$_REQUEST['id']}";
            $result = mysqli_query($conn,$sql);
            if($row = mysqli_fetch_assoc($result)){
                unlink("uploads/".$row['image_url']);
            }
        
            $name = $_REQUEST["name"];
            $email = $_REQUEST["email"];
            $gender = $_POST["gender"];
            $country = $_POST["country"];
            // $pass = $_REQUEST["pass"];
        
        
            $img_name = $_FILES["my_image"]["name"];
            $img_size = $_FILES["my_image"]["size"];
            $tmp_name = $_FILES["my_image"]["tmp_name"];
            $error = $_FILES["my_image"]["error"];
        
            if ($error === 0) {
                if ((empty($name)) || (empty($email)) || ($img_size > 925000)
                ) {
                    $em = "Sorry, your file is too large.";
                    header("Location: create.php?error=$em");
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png");
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
        
                        // Insert into Database
                        $sql = "UPDATE `form` set name = '$name', email= '$email', gender='$gender', country= '$country', image_url = '$new_img_name' where id = {$_REQUEST['id']}";
                        mysqli_query($conn, $sql);
                        echo "Updated Successfuly";
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
            // header("Location: index.php");
            // echo "Error";
        }
    }

    function ManagerEdit(){
        if (isset($_REQUEST["update"]) && isset($_FILES["my_image"])) {
            include "db_conn.php";
        
            $sql = "select * from `form` where id={$_REQUEST['id']}";
            $result = mysqli_query($conn,$sql);
            if($row = mysqli_fetch_assoc($result)){
                unlink("uploads/".$row['image_url']);
            }
        
            $name = $_REQUEST["name"];
            $email = $_REQUEST["email"];
            $gender = $_REQUEST["gender"];
            $country = $_REQUEST["country"];
            // $pass = $_REQUEST["pass"];
        
        
            $img_name = $_FILES["my_image"]["name"];
            $img_size = $_FILES["my_image"]["size"];
            $tmp_name = $_FILES["my_image"]["tmp_name"];
            $error = $_FILES["my_image"]["error"];
        
            if ($error === 0) {
                if ((empty($name)) || (empty($email)) || ($img_size > 925000)
                ) {
                    $em = "Sorry, your file is too large.";
                    header("Location: manager.php?error=$em");
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png");
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
        
                        // Insert into Database
                        $sql = "UPDATE `form` set name = '$name', email= '$email', gender='$gender',
                        country= '$country', image_url = '$new_img_name' where id = {$_REQUEST['id']}";
                        mysqli_query($conn, $sql);
                        echo "Updated Successfuly";
                        header("Location: manager.php");
        
                    } else {
                        $em = "You can't upload files of this type";
                        header("Location: manager.php?error=$em");
                    }
                }
            } else {
                $em = "unknown error occurred!";
                header("Location: manager.php?error=$em");
            }
        } else {
            // header("Location: index.php");
            // echo "Error";
        }
    }

    ?>
