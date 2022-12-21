<?php
    # Passing array to Function 

    // $marks = array(10,20,30,40);  // defining array
    // function total($subject)      // Array Parameter
    // {
    //     $sum = 0;
    //     foreach($subject as $num)
    //     {
    //         $sum = $sum + $num;
    //     }
    //     return $sum;
    // }

    // echo total($marks);           // Passing Array marks

    # Example 2

    $marks = array(10,20,30,40);  
    function total($subject = array(10,20,30))   // Default argument
    {
        $sum = 0;
        foreach($subject as $num)
        {
            $sum = $sum + $num;
        }
        return $sum;
    }
    
    // echo total($marks);                       // Passing Array marks
    // echo total();       
    
    
    # Returning array from Function 
    # Fucntion can't return multiple values 
    # but in the form of array we can return multiple values from function

    function mathop($num1, $num2)
    {
        $sum = $num1 + $num2;       // 50 + 10 = 60
        $sub = $num1 - $num2;       // 50 - 10 = 40
        $mul = $num1 * $num2;       // 50 * 10 = 500
        $div = $num1 / $num2;       // 50 / 10 = 5

        $solution = array($sum,$sub,$mul,$div);

        return $solution;
    }

    $arthop = mathop(50,10);
    echo "Sum = " . $arthop[0] . "<br>";
    echo "Sub = " . $arthop[1] . "<br>";
    echo "Mul = " . $arthop[2] . "<br>";
    echo "Div = " . $arthop[3] . "<br>";
?>