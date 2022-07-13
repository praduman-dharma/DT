<?php
    // Final method
    class Father{
        function disp(){            // Child class cannot redefine this method
            echo "You can override me because I am not final";
        }
        final function show(){
            echo "I am final so you cannot override me";
        }
    }

    class Son extends Father{
        function disp(){
            echo "Yeh I Overrided";
        }
    }

    $obj = new Son;
    $obj->show();

    // final class 

    final class Father{         // you can't extends final class            
        function disp(){
            echo "Final";
        }
    }
?>