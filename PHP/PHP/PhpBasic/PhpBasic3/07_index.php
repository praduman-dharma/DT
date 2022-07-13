<?php
    class Father{
        function __construct(){
            echo "<br> Parent Constructor Called";
        }
    }

    class Son extends Father{
        function __construct(){
            parent::__construct();              // for calling parent constructor
            echo "<br> Child Constructor Called";
        }
    }

    $obj = new Son();
?>