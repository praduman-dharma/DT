<?php
    # InterFace
    // An interface is like a class with nothing but abstract methods. All mehtods of interface must be public. It is also possible to declare a constructor in an interface. It's possible for interface to have constants(can not be overridden by a class/interface that inherites themm). interface keyword is used to create an interface.

    ## Defining Interface
    # Syntax

    /*
    interface interface_name{
        const properties;
        Method;
    }

    // Ex.
    interface Father{
        const a;
        public function disp();
    }
    */

    ## Extending Interface
    // An interface can extend(inherit) an interface.
    // One interface can inherit another interface using extends keywords.
    // An Interface can not extends classes.


    ## One Interface can extend more than one interface

    interface Father{
        const a = 101;
        function disp();
    }

    interface Mother{
        const b = 102;
        function showvalue();
    }

    interface Son extends Father, Mother{
        const s = 103;
        function display();
    }

?>