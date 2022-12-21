<?php
    // Cannot access Protected Property or Method Outside Class or Object
    // Protected Property or Class can be accessed within same class and 
    // Child Class can access Parent's or GrandParent's Protected Property or Method

    class Father{
        protected $a = 30;
    }
    class Son extends Father{
        protected $b = 20;
    }

    class GrandSon extends Son{
        public function displayGrandSon(){
            echo $this->a ."<br>" . $this->b;
        }
    }
    $obj = new GrandSon;
    $obj->displayGrandSon();

?>