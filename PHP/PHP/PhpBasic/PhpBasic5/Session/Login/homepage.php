<?php
    session_start();

    if (!isset($_SESSION['luser'])) {
        echo "Please Login again<br>";
        echo "<a href='http://localhost/DT/PHP/PHP/PhpBasic5/Session/Login/login.php'>Click Here to Login</a>";
        
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <br> <a href='http://localhost/DT/PHP/PHP/PhpBasic5/Session/Login/login.php'>Login again</a>";
        }
        else { //Starting this else one [else1]
?>
            <!-- From here all HTML coding can be done -->
            <html>
                <h2 style='color:red'>
                Welcome
                <?php
                    echo $_SESSION['luser'] . "</h2><br>";
                    echo "<a href='http://localhost/DT/PHP/PHP/PhpBasic5/Session/Login/logout.php'>Log out</a>";
                ?>
            </html>
            <script>
                setTimeout(function () { location.reload(1); }, 11000);
            </script>
<?php
        }
    }
?>