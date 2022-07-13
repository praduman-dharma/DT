<?php
# Object
# Example 1
    // class Mobile{
    //     var $model;         // properties
    //     function showModel($number){
    //         global $model;
    //         $model = $number;
    //         echo "Model Number is : $model <br>";
    //     }
    // }
    // $samsung = new Mobile;          // you can write paranthese $samsung = new Mobile();
    // $samsung -> showModel('J2');

    // $Gionee = new Mobile;
    // $Gionee -> showModel('P5W');

    # Example 2 ,Example 1 is return using old method

    // class Mobile{
    //     var $model;
    //     function showModel($number){
    //         $this->model = $number;
    //         echo "Model Number is : $this->model";
    //     }
    // }

    // $Apple = new Mobile;
    // $Apple -> showModel('iphone 12');

    # Example 3 

class Mobile{
    var $model;
    function showModel(){
        echo "Model Number is: $this->model <br>";      // dont give spaces $this-> model;
    }
}

$samsung = new Mobile;
$samsung ->model = "A8";
$samsung ->showModel();

$lg = new Mobile;
$lg ->model = "G5";
$lg ->showModel();

$Nokia = new Mobile;
$Nokia ->model = "Nokia 800";
$Nokia ->showModel();


?>