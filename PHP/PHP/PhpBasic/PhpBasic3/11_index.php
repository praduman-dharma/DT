<?php
    # Access Modifier with Constructor
    class Father{
        private function __construct(){
            echo "Parent Constructor Called";
        }
    }
    $obj = new Father;
?>