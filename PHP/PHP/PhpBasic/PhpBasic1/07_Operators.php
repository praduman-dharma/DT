<?php
        // 1. Arithmetic Operator   +, -, *, /, %.

        # Example 1
        
        // echo 4 + 2  ."<br>";
        // echo 4 - 2  ."<br>";
        // echo 4 * 2  ."<br>";
        // echo 4 / 2  ."<br>";
        // echo 5 % 2  ."<br>";
        
        # Example 1
        $num1 = 4;
        $num2 = 2;

        // echo $num1 + $num2  ."<br>";
        // echo $num1 / $num2  ."<br>";
        // echo $num1 + 6;  

        // 2. Assignment Operator   =, +=, -=, *=, /=, %=.

        // This operators is used assign value to variable.

        # Example 1

        $price = 25.36;
        $name = "Praduman";
        // $ram = 10;
        // $shyam = 10;
        // $rohan = 10;
        $ram = $shyam = $rohan = 10;
        
        // echo $ram   ."<br>";
        // echo $shyam ."<br>";
        // echo $rohan ."<br>";

        # Example 2

        $m = 15;
        // $m += 10;       # shorthand of $m = $m + 10;
        // $m -= 10;       # shorthand of $m = $m - 10;
        // $m *= 10;       # shorthand of $m = $m * 10;
        // $m /= 10;       # shorthand of $m = $m / 10;
        $m %= 10;       # shorthand of $m = $m % 10;
        // echo $m;


        # Comparision   Operators  -    <, >, <=, >=, ==,!=, 
        //                         - === (This operator check value with datatype)  

        // != (not equal) and <> (not equal)  both are same
        // echo (10 != "10");

        // !== (not identical) compare with datatype 
        // echo (10 !== "10");

        // <=> (Spaceship operator)
        // It returns -1,0 or 1  when $a is respectively less than,equal to,or greater than $b


        // echo (10>5);    # if condition is true it will print 1
        // echo (10<5);    # if condition is false it will print " "(empty string)


        // if (10<20)
        // if (10>20)
        // if (10<=20)                 # < or = ,if one condition is true means true
        // if (10>=20)
        // if (10==20)
        // if (20==20)

        // if (20=="20")
        // {
        //         echo "Condition is True <br>";
        // }
        // else
        // {
        //         echo "Condition is False <br>";
        // }
        // echo "Rest of the code";

        // echo PHP_VERSION;

        # Logical Operators -
        //  && (logical And)
        //  || (logical OR)
        //  ! (logical NOT)
        //  and (logical AND)
        //  or (logical OR)
        //  xor (Exclusive OR)

        # both && (logical AND) and (and - logical and ) is work same and both are same but 
        //                                               && have more precedence(imporatants).

        # both || (logical OR) and (or - logical or ) is work same and both are same but 
        //                                                || have more precedence.

        # Example 

        // if((5>3) && (5>2))           // AND
        // if((5>3) and(5>2))

        // if((5>3) || (5<3))           // OR
        // if((5>3) or (5<3))

                                        // XOR(Exclusive OR)  same, same = false
                                        //                    different, different  = True
        // if((5>3) xor (5>3))                 

        // if(!(5>3))           // not  - condition true hoga to false,
        // if(!(5<3))          //        condition false hoga to true 
        // {
        //         echo "Condition is True <br>";
        // }
        // else
        // {
        //         echo "Condition is False <br>";
        // }


?>
