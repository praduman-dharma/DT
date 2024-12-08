<?php
    class Father{
        function disp(){
            echo "Super Class <br>";
        }
    }

    class Son extends Father{
        function disp(){            // redefining parent method,if parent have parameter you
                                    // have to write parameter in child class also
            echo "Son Class <br>";
        }
    }


    $obj = new Son;
    $obj->disp();

    $obj = new Father;
    $obj->disp();       


?>