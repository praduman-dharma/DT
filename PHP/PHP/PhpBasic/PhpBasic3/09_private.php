<?php
    // Private Property or Method can be accessed only within same class
    // Private Property cannot be access outside class or with object
    // In Inheritance, Child Class cannot access Parent's Private Property or 
    // Method

    # Example 1
    class Father{
        private $a;
        public function displayParent(){
            $this->a = 30;
            echo "Parent Function $this->a";
        }
    }

    $obj = new Father;
    // $obj->a;     // This show error,because you can't access private properties

    $obj->displayParent();

    # Example 2
    
?>