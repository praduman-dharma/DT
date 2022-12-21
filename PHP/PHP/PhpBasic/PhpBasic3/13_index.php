<?php
    # Static Property Inside Static Method
    // class Father{
    //     public static $a = 10;
    //     public static function disp(){
    //         echo self::$a;
    //     }
    // }

    // Father::disp();

    # static properties ko aap non static method me aap access kar sakte he
    # non static properties ko static method me access nahi kar sakte he

    # Static with Inheritance

    class Father{
        public static $a = 20;
    }

    class Son extends Father{
        function disp(){
            echo Father::$a;
        }
    }

    $obj = new Son;
    $obj->disp();
?>