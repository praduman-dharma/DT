<?php
    class model{
        private $connection;

        function __construct()
        {
            $this->connect_db();
        }

        public function connect_db(){
            $this->connection = mysqli_connect('localhost','root','','new_db');
            if(mysqli_connect_error()){
                die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
            }
            // echo "Connection Successfully<hr>";
        }

        public function create($fname,$lname,$email,$gender,$age){
            $sql = "INSERT INTO `crud` (firstname, lastname, email, gender, age) VALUES ('$fname', '$lname', '$email', '$gender', '$age')";
            $res = mysqli_query($this->connection, $sql);
            if($res){
                 return true;
            }else{
                return false;
            }
        }
    }

?>