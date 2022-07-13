<?php
    // Public Property or Method Can be accessed from anywhere
    // Example 1
    // class Father{
    //     public $a;        
    //     public function disp(){
    //         echo "Parent Function $this->a";
    //     }
    // }

    // $obj = new Father;
    // $obj->a = 10;
    // $obj->disp();


    # Example 2
    class Father{
        public $a;
        public function displayParent(){
            echo "Parent Function $this->a";
        }
    }
    class Son extends Father{
        public function displayChild($x){
            $this->a = $x;
            echo "Child Value is $this->a <br>";
            $this->displayParent();
        }
    }

    $obj = new Son;
    $obj->displayChild(10);
?>