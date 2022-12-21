<?php
    # Const

    class Father{
        const mark = 101;
        // const mark = 102;       // You cannot redefine const variable
        function disp(){
            echo self::mark;
        }
    }

    $obj = new Father;
    $obj->disp();

    echo Father::mark;          // For accessig  variable outside class

?>