<?php
# Abstract Class
# Example 1
    // abstract class Father{
    //     function disp(){
    //         echo "Normal Method";
    //     }
    // }                                

    // $obj = new Father;      // Abstract class ka object nahi create kar sakte
    // $obj->disp();?

    # Example 2
    abstract class Father{
        function disp(){
            echo "Normal Method";
        }
        abstract function absmethod();      // Child class iss method ko define karega
                                // Abstract class me hi abstract method bana sakte he
                                // Abstract class me abstract method ko define nahi  kar sakte
    }

    class Son extends Father{
        public function absmethod(){       // Defining abstract method
            echo "Abstract Method";
        }
    }

    $obj = new Son;
    $obj->absmethod();

?>