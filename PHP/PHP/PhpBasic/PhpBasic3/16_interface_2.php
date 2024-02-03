<?php
    // One interface can be implement in single class

    interface Father{
        const mark = 101;
        function disp();
        function getValue();
    }

    class Son implements Father{
        public $a;
        public function disp(){
            echo Father::mark;
        }
        // if you don't wont to define the interface method than define it like below method
        public function getValue(){}
    }

    $obj = new Son;
    $obj->disp();
?>