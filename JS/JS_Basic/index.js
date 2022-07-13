/*
// console.log("Hello World!!!!");

// Variable and Data types
 var firstName = "Praduman";
//  console.log(firstName);

var lastName = "Pandey";
var age = 20;

console.log(lastName);
console.log(age);

var answer = true;
console.log(answer);

// var job;
// var job = undefined;
// console.log(job);

var $3years = 3;
console.log($3years);

// single line comment
    /* Multi 
       line 
       comment 
            */

// // Variable mutation and type correction
// var firstName = "Salman Khan";
// var age = 56;

// console.log(firstName + ' ' + age); // Type of age automaticaly converted to string from int.

// var job ,isMarried;         // Declaring multiple variable in single line
// job = "Actor";
// isMarried = false;

// console.log(firstName + ' is a ' + age + ' year old ' + job + '. Is he married?' + isMarried );

// // Variable Mutation        - 
// age = "fifty nine";         // variable ko dusri bar define karte vakt var nahi bhi likhoge to chalega

// job = "heavy Driver";

// // alert(firstName + ' is a ' + age + ' year old ' + job + '. Is he married?' + isMarried);

// // Taking input
// // var name = prompt("Enter your name?");
// // console.log(name);
 


// Operators
// var now = 2021;
// var johnAge = 33;
// var markAge = 28;

// // Math operators
// yearJohn = now - johnAge;
// console.log(yearJohn);

// yearMark = now - markAge;
// console.log(yearMark);

// console.log(now + 2);
// console.log(now * 2);
// console.log(now / 10);

// var johnOlder = johnAge > markAge;
// console.log(johnOlder);

// // Type of variable
// console.log(typeof(johnOlder));
// console.log(typeof markAge);
// console.log(typeof "John is older than mark");

// var x;
// console.log(typeof(x));

// Conditions 

// if

// var firstName = "John";
// var age = 13;

// if(age < 16){
//     console.log(firstName + " is a boy")
// } 
// else if(age >= 13 && age < 20){
//     console.log(firstName + " is a teenager");  // age between 13 to 20 called teenagers.
// }
// else if(age >=20 && age < 30){
//     console.log(firstName + " is a young man");
// }
// else {
//     console.log(firstName + " is a man");
// }

// Ternory Operator/Conditional Operator
// var firstName = "John";
// var age = 13;

// age >= 18 ? console.log(firstName +" drinks beer") : console.log(firstName + " drinks juice");

// var drink = age>=18 ? "beer" : "juice";
// console.log(drink);

// Switch Statement             // case sensitive
// var firstName = "John";
// var job = "teacher";

// switch(job){
//     case "teacher":
//         console.log(firstName + " teaches kids how to code.");
//         break;
//     case "driver":
//         console.log(firstName + " drives an uber in India.");
//         break;
//     case "designer":
//         console.log(firstName + " designs beautiful websites");
//         break;
//     default:
//         console.log(firstName+ " does something else.");
// }

// age = 17;
// switch(true){
//     case age < 16 :
//         console.log(firstName + " is a boy");
//         break;
//     case age >= 13 && age < 20:
//         console.log(firstName + " is a teenager");
//         break;
//     case age >=20 && age < 30:
//         console.log(firstName + " is a young man");
//         break;
//     default:
//         console.log(firstName + " is a man");
// }

// falsy values
// falsy values : undefined, null, 0,'', NaN(not a number);
// truthy values: Not falsy values

var height;
height = 0;
if(height || height === 0){
    console.log("Variable is defined");
} 
else {
    console.log("Variable has not been defined");
}


