<?php 
    include("model.php");
    class controller{
        public function create($fname,$lname,$email,$gender,$age){
            $obj = new model();
            $res = $obj->create($fname,$lname,$email,$gender,$age);
            if($res){
                return true;
           }else{
               return false;
           }
        }
    }
?>