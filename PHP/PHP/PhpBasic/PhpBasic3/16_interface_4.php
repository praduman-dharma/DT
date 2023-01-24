<?php
    // extends and implements together
    // multiple inheritance using Interface

   class Father{
        public $sci = 101;
   }

   interface Mother{
        const math = 102;
        public function disp();
   }

   class Son extends Father implements Mother{
        public function disp(){
            echo $this->sci;
            echo Mother::math;
        }
   }

   $obj = new Son;
   $obj->disp();