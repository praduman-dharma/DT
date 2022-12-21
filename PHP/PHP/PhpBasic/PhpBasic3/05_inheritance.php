<?php
    // Single Inheritance
    // class Father{                   // Parent Class
    //     public $a;
    //     public $b;
    //     function getvalue($x,$y){
    //         $this->a = $x;
    //         $this->b = $y;
    //     }
    // }
    // class Son extends Father{          // Child Class
    //     function display(){
    //         echo "Value of A : $this->a <br>";
    //         echo "Value of B : $this->b";
    //     }
    // }

    // $obj = new Son;
    // $obj->getvalue(30,20);
    // $obj->display();

    # Multilevel Inheritance
    // class Father{
    //     public $a;
    //     public $b;
    //     function getValue($x,$y){
    //         $this->a = $x;
    //         $this->b = $y;
    //     }
    // }
    // class Son extends Father{
    //     public $c = 30;
    //     public $sum;
    //     function add(){
    //         $this->sum = $this->a + $this->b + $this->c;
    //         return $this->sum;
    //     }
    // }
    // class GrandSon extends Son{
    //     function display(){
    //         echo "Vaule of A : $this->a <br>";
    //         echo "Vaule of B : $this->b <br>";
    //         echo "Vaule of C : $this->c <br>";
    //         echo "Vale of Sum :". $this->add() . "<br>";
    //     }
    // }

    // $obj = new GrandSon;
    // $obj->getValue(10,20);
    // $obj->display();

    
?>