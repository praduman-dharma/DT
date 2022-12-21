<?php
# Example 1
    // class Father{
    //     public static $a = 10;
    //     public function disp(){
    //         echo self::$a;
    //     }
    // }

    // // Father::$a = 20;        // for accessing static variable use this  
    // $obj = new Father;
    // $obj->disp();

    # Example 2
    // class Father{
    //     public static function disp(){
    //         echo " $a Hello GeekyShows";
    //     }
    // }

    // Father::disp();         // You Don't have to create object in static method

    # Example 3
    class Father{
        public static function disp($name){
            echo "Hello $name";
        }
    }

    Father::disp("Praduman");


?>