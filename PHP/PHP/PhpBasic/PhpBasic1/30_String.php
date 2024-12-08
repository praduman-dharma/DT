<?php
   # String is group of character
   # Ex 
        // "Welcome";
        // "Geeky Shows";
        // 'Hello World';
        // $name = "Geeky Shows";
        // $comp = "dell";
        // $set = 'gem';
        // echo "Geeky Shows";
        // echo 'Hello World';

    # A string literal can be specified in four different ways
    // 1.Single Quoted
    //     Ex : - 'Geeky Shows'
    // 2.Double Quoted
    //     Ex : - "Geeky Shows"
    // 3.heredoc - It works similar as double quotes.It means it can also print
    //             variable's value.

    #  Example of heredoc
    // echo<<<MYDATA
    // <b>This is first line</b>
    // This is "second line"
    // This is third line
    // MYDATA;

    // 4.nowdoc - It works similar as single qutoes.

    #  Example of nowdoc
    // echo<<< 'MYDATA'
    // <b>This is first line</b>
    // This is "second line"
    // This is third line
    // MYDATA;

    # Access Character in String
    // $name = "GeekyShows";
    // echo $name[0];

    # Diffrence between Single Quote and Double Quote

    // 1.Single qoute is said to be literal.It doesn't parse the data.Double quote is said to be interpreted.

    // Example
    // $number = 564;
    // echo "$number <br>";  # it will print the value of $number
    // echo '$number'        # it will print $number as it is as string

    // 2.
    // # We can't use single quote within single qoute.
    // # We can't use double quote within double qoute.
    // Example
    // echo 'I am 'PHP' <br>';     # it will show you error
    // echo "I am "PHP" <br>";

    // 3.
    // # We can use double quote within single qoute.
    // # We can use single quote within double qoute.
    // Example
    // echo 'I am "PHP" <br>';     # it will not show error
    // echo "I am 'PHP' <br>";

    // 4.
    # use escape \ to use double qoute within double qoute.
    # use escape \ to use single qoute within single qoute.
    // Example
    // echo 'I am \'PHP\' <br>';    # single qoute ke andar single qoute use karna ho to
    // echo "I am \"PHP\" <br>";    # double qoute ke andar double qoute use karna ho to
    // echo '\\';                   # it will print only 1 \  and skip 1 \




?>