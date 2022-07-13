<?php

    # Example 1 

    // $date = 24;

    // switch($date)
    // {
    //     case 10:
    //         echo "C Programing";
    //         break;

    //     case 15:
    //         echo "C++ Programing";
    //         break;

    //     case 20:
    //         echo "Python Programing";
    //         break;
        
    //     case 25:                        # we can give multiple statement like this
    //     case 26:
    //     case 28:
    //     case 30:
    //         echo "Java Programing";
    //         break;

    //     default :
    //         echo "No Exam";     # If no expression matches,than this statement will print

    // }

    # Example 2 - string expression

    // $day = "Mon";

    // switch($day)
    // {
    //     case "Mon":
    //     case "mon":                 # for giving multiple expression
    //         echo "C Programing";
    //         break;
        
    //     case "Tue":
    //         echo "C++ Programing";
    //         break;

    //     case "Sun" :
    //         echo "Holiday";
    //         break;
        
    //     default :
    //         echo  "No Exam";
    // }

    # Example 3 - Example 2 return in another format

    $day = "Tue";

    switch($day):                        # first { (curly bracket) replace by :(colon)
        case "Mon":
        case "mon":
            echo "C Programing";
            break;
        
        case "Tue":
            echo "C++ Programing";
            break;
        
        case "Sun":
            echo "Holiday";
            break;
        
        default:
            echo "No Exam";
    endswitch;                           # and } (ending curly bracket)replace  by endswitch;

?>