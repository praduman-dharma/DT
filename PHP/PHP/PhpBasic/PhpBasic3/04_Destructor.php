<?php
    class Student{
        public $roll;
        function __construct($enroll){
            echo "Para Constructor Called <br>";
            $this->roll = $enroll;
            echo $this->roll;
        }
        function __destruct(){
            echo "<br>Object Trashed";
        }
    }

    $stu = new Student(10);
?>