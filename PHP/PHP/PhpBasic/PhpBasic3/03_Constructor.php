<?php
//Type of Constructor
// 1.Default Constructor
    // class Student{
    //     function __construct(){
    //         echo "Constructor Called";
    //     }
    // }

    // $stu = new Student;

// 2.Parameterized Constructor

class Student{
    public $roll;
    function __construct($enroll){
        echo "Para Constructor Called <br>";
        $this->roll = $enroll;
        echo $this->roll;
    }
}

$stu = new Student(10);
?>