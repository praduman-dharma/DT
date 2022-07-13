<?php
    # Increment and Decrement Operators

    # Increment Operators

    $a = 3;
    $b = 3;
    echo "<br>" . $a;
    echo "<br>" . $a++ ;        # post increment
    echo "<br>" . $a ;
    echo "<br>" . ++$b ;        # pre increment
    echo "<br>" . $b;

    // Decrement Operators
    echo(" <br> Decrement Operators");

    $c = 3;
    $d = 3;
    echo "<br>" . $c;
    echo "<br>" . $c-- ;        # post Decrement
    echo "<br>" . $c;
    echo "<br>" . --$d;         # pre Decrement
    echo "<br>" . $d;

    
    $e = 3;
    echo "<br>";
    // $e = $e + 1;    # Another way of Increament
    $e += 1;           # Another way of Increament
    echo $e;

    $f = 3;    
    echo "<br>";
    // $f = $f - 1;    # Another way of Decreament
    $f -= 1;           # Another way of Decreament
    echo $f;

?>