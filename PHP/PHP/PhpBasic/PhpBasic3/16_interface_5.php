<?php
    // implements multiple interface in class

    class Father{
      public $sci = 101;
    }

   interface Mother{
     const math = 102;
     public function disp();
   }

   interface uncle {

   }
   
   class Son extends Father implements Mother, uncle{
     public function disp(){
          echo $this->sci;
          echo Mother::math;
     }
   }

   $obj = new Son;
   $obj->disp(); 