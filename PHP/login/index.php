<?php
session_start();
if(isset($_REQUEST["create"])){
    header("location:NewAcc.php");
}
if (isset($_REQUEST["submit"])) {
    require_once("db_conn.php");
    $user = $_REQUEST["email"];
    $_SESSION['user'] = $user;
    $pass = $_REQUEST["pass"];
    $sql = "SELECT * FROM `form` where email='$user'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num != 0) {
        // LOGIN code
        while ($row = mysqli_fetch_assoc($result)) {
            $dbusername = $row['email'];
            $dbpassword = $row['pass'];
            $dbuser = $row['role'];
        }

        // Check to see if username and password match
        if ($user == $dbusername && $pass == $dbpassword  && $dbuser == 'admin') {
            header('location:admin.php');
        } elseif($user == $dbusername && $pass == $dbpassword  && $dbuser == 'manager'){
            header('location:manager.php');
        } elseif($user == $dbusername && $pass == $dbpassword  && $dbuser == 'user'){
            header("location:user.php");
        }
        else {
            echo "Sorry $user. Incorrect password!";
        }
    } else {
        echo "Sorry no username found with this name";
    }
} else { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Welcome To Registration Form</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

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

            .error {
                display: block;
                color: black;
                margin-left: 5px;
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
                <form action="" id="form" method="POST">
                    <table cellspacing="2" align="center" cellpadding="8" border="0">
                        <tr>
                            <td align="right" class="bold">Enter Email ID :</td>
                            <td><input type="text" placeholder="Enter Email ID here" id="t2" class="tb" name="email" /></td>
                        </tr>

                        <tr>
                            <td align="right" class="bold">Enter Password :</td>
                            <td><input type="password" placeholder="Enter Password here" id="t5" class="tb" name="pass" /></td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Create Account" class="btn" name="create">
                            </td>
                            <td>
                                <input type="submit" value="Login" class="btn" id="submitbtn" name="submit">

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    <?php } ?>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="js/script.js"></script> -->
    </body>

    </html>