<?php
// Normal way
/*
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
*/

// with function
include("function.php");
ManagerEdit();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome To Registration Form</title>
    <style>
        body {
            margin: 0px;
            background-color: #f26724;
            background-image: url(image/background.jpg);
            color: #f9fcf5;
            font-family: Arial, Helvetica, sans-serif;
            height: 3000px;
        }

        #main {
            width: 600px;
            height: auto;
            overflow: hidden;
            padding-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 5px;
            padding-left: 10px;
            margin-top: 100px;
            border-top: 3px double #f1f1f1;
            border-bottom: 3px double #f1f1f1;
            padding-top: 20px;
        }

        #main table {
            font-family: "Comic Sans MS", cursive;
        }

        /* css code for textbox */
        #main .tb {
            height: 28px;
            width: 230px;
            border: 1px solid #f26724;
            color: #fd7838;
            font-weight: bold;
            border-left: 5px solid #f7f7f7;
            opacity: 0.9;
        }

        #main .tb:focus {
            height: 28px;
            border: 1px solid #f26724;
            outline: none;
            border-left: 5px solid #f7f7f7;
        }

        /* css code for button*/
        #main .btn {
            width: 150px;
            height: 32px;
            outline: none;
            color: #f7f7f7;
            font-weight: bold;
            border: 0px solid #f26724;
            text-shadow: 0px 0.5px 0.5px #fff;
            border-radius: 2px;
            font-weight: 600;
            color: #f26724;
            letter-spacing: 1px;
            font-size: 14px;
            background-color: #f1f1f1;
            -webkit-transition: 1s;
            -moz-transition: 1s;
            transition: 1s;
        }

        #main .btn:hover {
            background-color: #f26724;
            outline: none;
            border-radius: 2px;
            color: #f1f1f1;
            border: 1px solid #f1f1f1;
            -webkit-transition: 1s;
            -moz-transition: 1s;
            transition: 1s;
        }

        button.bottom {
            position: fixed;
            bottom: 59px;
            border-radius: 32px;
            padding: 12px 10px;
            width: 10%;
            right: 47px;
            border: solid palegreen 1px;
            font-family: -webkit-body;
            background-color: transparent;
            cursor: pointer;
        }

        button.btn {
            position: fixed;
            bottom: 110px;
            border-radius: 32px;
            padding: 12px 10px;
            width: 10%;
            right: 47px;
            border: solid palegreen 1px;
            font-family: -webkit-body;
            background-color: transparent;
            cursor: pointer;
        }


        .ptr {
            position: fixed;
            bottom: 1px;
            border-radius: 32px;
            padding: 12px 10px;
            width: 9%;
            right: 45px;
            border: solid palegreen 1px;
            font-family: -webkit-body;
            background-color: transparent;
            display: flex;
            justify-content: center;
            cursor: pointer;
        }

        a.printPage {
            font-weight: 20px;
            text-decoration: none;
            color: black;
            font-family: -webkit-body;
        }

        #parent {
            width: 40%;
            background-color: rebeccapurple;
            margin: 10px auto;
            border-radius: 34px;

        }

        #newElement {
            height: 40px;
            width: 100px;
            margin: 0 auto;
            color: white
        }

        div#newElement {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 180px;
        }

        div#newElement p {
            width: 300px;
        }

        td.bold {
            margin-top: 4px;
            display: inline-block;
        }

        .error {
            display: block;
            color: black;
            margin-left: 5px;
        }

        input.img {
            border: 1px solid white;
            border-left: 2px solid white;
            background: #FFFFFF;
            color: black;
            width: 234px;
            height: 25px;
            align-items: center;
            cursor: pointer;
        }
        button.btn {
            padding: 0px;
            border-radius: 0px;
        }
        a{
            list-style: none;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <!-- Main div code -->
    <div id="main">
        <div class="h-tag">
            <h2 class="blink">Create Your Account</h2>
        </div>
        <!-- create account div -->
        <div class="login">
            <?php
                
                include "db_conn.php";
                if (isset($_REQUEST['edit'])) {
                    $sql = "select * from form where id = {$_REQUEST['id']}";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                }

                
            ?>
            <form action="" method="post" id="form" enctype="multipart/form-data">
                <table cellspacing="2" align="center" cellpadding="8" border="0">
                    <tr>
                        <td align="right" class="bold">Enter Name :</td>
                        <td><input type="text" placeholder="Enter user here" id="t1" class="tb" name="name" 
                        value="<?php if(isset($row['name'])){ echo $row['name'];} ?>"></td>
                    </tr>
                    <tr>
                        <td align="right" class="bold">Enter Email ID :</td>
                        <td><input type="email" placeholder="Enter Email ID here" id="t2" class="tb" name="email"
                        value="<?php if(isset($row['email'])){ echo $row['email'];} ?>"></td>
                    </tr>

                    <tr>
                        <td align="right" class="bold">Gender :</td>
                        <td>
                            Male<input type="radio" name="gender" value="male" 
                            <?php if(isset($row['gender']) == 'male'){ echo "checked";} ?>>
                            Female<input type="radio" name="gender" value="female" <?php 
                            if(isset($row['gender']) ){
                                if($row['gender'] == 'female'){
                                    echo "checked";
                                   }
                                }
                             ?>>
                        </td>
                    </tr>

                    <tr>
                        <td align="right" class="bold">Select Country :</td>
                        <td>
                            <select class="tb chosen" id="select_id" name="country">
                                <option>Select</option>
                                <option value="India" <?php if ($row['country'] == 'India') {
                                                            echo "selected";
                                                        } ?>>India</option>
                                <option value="Russia" <?php if ($row['country'] == 'Russia') {
                                                            echo "selected";
                                                        } ?>>Russia</option>
                                <option value="USA" <?php if ($row['country'] == 'USA') {
                                                        echo "selected";
                                                    } ?>>USA</option>
                                <option value="UK" <?php if ($row['country'] == 'UK') {
                                                        echo "selected";
                                                    } ?>>UK</option>
                                <option value="Srilanka" <?php if ($row['country'] == 'Srilanka') {
                                                                echo "selected";
                                                            } ?>>Srilanka</option>
                                <option value="Japan" <?php if ($row['country'] == 'Japan') {
                                                            echo "selected";
                                                        } ?>>Japan</option>
                                <option value="Australia" <?php if ($row['country'] == 'Australia') {
                                                                echo "selected";
                                                            } ?>>Australia</option>
                                <option value="Taiwan" <?php if ($row['country'] == 'Taiwan') {
                                                            echo "selected";
                                                        } ?>>Taiwan</option>
                                <option value="Israel" <?php if ($row['country'] == 'Israel') {
                                                            echo "selected";
                                                        } ?>>Israel</option>
                                <option value="Bangladesh" <?php if ($row['country'] == 'Bangladesh') {
                                                                echo "selected";
                                                            } ?>>Bangladesh</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="right" class="bold">Select photo :</td>
                        <td><input type="file" class="img" name="my_image"
                        value="<?php if(isset($row['image_url'])){ echo $row['image_url'];} 
                        ?>" ></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="reset" value="Clear Form" id="res" class="btn" />
                            <input type="submit" value="Update" class="btn" id="submitbtn" name="update" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <button type="submit" name="view" class="btn"><a href="manager.php">View</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="js/02_script.js"></script>
</body>

</html>