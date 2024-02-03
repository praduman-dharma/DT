<?php
    // More than one interface can be implemented in a single class.

    interface Father{
        const sci = 101;
        function disp();
        function getValue();
    }

    interface Mother{
        const math = 102;
    }

    class Son implements Father, Mother{
        public $a;
        public function disp(){
            echo Father::sci;
            echo Mother::math;
        }
        // if you don't wont to define the interface method than define it like below method
        public function getValue(){}
    }

    $obj = new Son;
    $obj->disp();
?>