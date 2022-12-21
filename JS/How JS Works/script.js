//
// Hoisting

calculateAge(2001);             // calling function before declaring

function calculateAge(year){
    console.log(2022 - year);
}

// retirement(2001);               // you can't declare this function before declaring

var retirement = function(year){
    console.log(65 - (2022 - year));
}


// Variables

// console.log(age)        // you can't  print variable first.

var age = 23;
console.log(age)

function foo(){

    console.log(age);       // it will show you undefined
    var age = 65;
    console.log(age);
}
foo();
console.log(age);


//

// First Scoping Example

// var a = "Hello!";
// first();

// function first(){
//     var b = "Hi!";
//     second();

//     function second(){
//         var c = "Hey!";
//         console.log(a + b + c);
//     }
// }

// Example to show the difference between execution stack and scope chain

var a = "Hello!";
first();

function first(){
    var b = "Hi!";
    second();

    function second(){
        var c = "Hey!";
        third();
    }
}

function third(){
    var d = "John";
    // console.log(c);         // This will show you error
    console.log(a+d);
}