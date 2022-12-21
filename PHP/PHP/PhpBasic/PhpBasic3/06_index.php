<?php
    class Father{
        public $a;
        public $b;
        function getValue($x,$y){
            $this->a = $x;
            $this->b = $y;
        }
    }

    class Son extends Father{
        function add(){
            return $this->a + $this->b;
        }
        function display(){
            echo "Value of A : $this->a <br>";
            echo "Value of B : $this->b <br>";
            echo "Addition :" . $this->add() . "<br>";
        }
    }

    class Daughter extends Father{
        function Multi(){
            return $this->a * $this->b;
        }
        function display(){
            echo "Value of A : $this->a <br>";
            echo "Value of B : $this->b <br>";
            echo "Multiplication :". $this->Multi() . "<br>";
        }
    }

    $objs = new Son;
    $objs->getValue(10,20);
    $objs->display();

    $objd = new Daughter;
    $objd->getValue(40,50);
    $objd->display();
