<?php
    class Mobile{
        public $model;
        function showModel(){
            $this->model;
            echo $this->model;
        }
    }

    $samsung = new Mobile;
    $samsung ->model = "A8+";
    $samsung ->showModel();
 
?>