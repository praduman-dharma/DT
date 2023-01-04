// 1.Ways to print in JavaScript
// alert("are you sure");
//  document.write("This is document write");

// 2.JavaScript console API(Application Programming Interface)
// console.log('Hello world');
// console.log('Hello world', 4 + 6, 'Another log');
// console.warn("This is warning");
// console.error("This is an error");


// Comment in JS
// single line comment

/*
Multi 
Line 
Coment
*/

// 3.JavaScript Variables
// What are Variables? - Containers to store data values

var number1 = 56;
var number2 = 34;
// console.log(number1+number2);

// Numbers
var num1 = 455;
var num2 = 56.76;

// String 
// we can write string in single/double quotes
var str1 = "This is String";
var str2 = 'This is also a String';

// Object
var marks = {
    Praduman: 90,
    Parth: 96,
    Ranjeet: 90,
}

// console.table(marks)         // show object data in table form
// console.log(marks);

// Booleans
var a = true;
var b = false;
// console.log(a,b);

// undefined
var und = undefined;
var und;  // It's also a undefined variable
// console.log(und);

var n = null;
// console.log(n);

/*
At a very high level, there are two types of data types in JS

1.Primitive data types: undefined, null, number, string, boolean, symbol
2.Reference data types: Arrays and Objects

*/

// Array

var arr = [1, 2, 'Rajan', 4, 5];
// console.log(arr);

// Operators in JavaScript

// Arthmetic Operator 
var a = 100;
// var b = 10; 
// console.log("The value of a + b  is",a+b);
// console.log("The value of a - b  is",a-b);
// console.log("The value of a * b  is",a*b);
// console.log("The value of a / b  is",a/b);

// Assignment Operators

var c = b;
// c += 2; // c = c + 2;
// c -= 2; // c = c - 2;
// c *= 2; // c = c * 2;
// c /= 2; // c = c / 2;
// console.log(c);

// Comparison Operators

var x = 34;
var y = 56;
// console.log(x < y);
// console.log(x > y);
// console.log(x >= y);
// console.log(x <= y);
// console.log(x == y);
// console.log(x != y);

// Logical Operator  - logical operator  operates in boolean values

// Logical And
// console.log(true && true);
// console.log(true && false);
// console.log(false && true);
// console.log(false && false);

// console.log("     ")

// Logical OR
// console.log(true || true);
// console.log(true || false);
// console.log(false || true);
// console.log(false || false);

// console.log("     ")

// Logical NOT

// console.log(!false);
// console.log(!true);

// Function
function avg(a, b) {
    c = (a + b) / 2;
    return c;
}

// DRY = DO Not Repeat yourself
c1 = avg(4, 6);
c2 = avg(14, 16);
// console.log(c1, c2);

// Conditional in JS

var age = 19;
// Single if statement
// if(age > 18){
//     console.log('You can drive');
// }

// if-else statement

// if(age > 18){
//     console.log('You can drive');
// }
// else{
//     console.log('You cannot drive');
// }

// if - else Ladder
var a = 2;

// if(a <= 1){
//     console.log("Good Morning");
// }
// else if(a <= 2){
//     console.log("Good Afternoon");
// }
// else if(a <= 3){
//     console.log("Good Evening");
// }
// else{
//     console.log("Good night");
// }
// console.log("End of ledder");


// Exercise


// function drink(age){
//     if(age>18){
//         console.log("You can drink RASNA")
//     }
//     else{
//         console.log("You cannot drink RASNA")
//     }
// }

// d1 = drink(19);
// console.log(d1);

// loops


var arr = [1, 2, 3, 4, 5, 6, 7];

// for loop

// console.log(arr);
// for(var i=0;i<arr.length;i++){
//     console.log(arr[i]);
// }

// for each

// arr.forEach(function(element){
//     console.log(element);
// })



// variable
// var - it is global variable
// let - it is block level variable
// const - the value cannot be change

// let j = 0 ;
//while loop

// while(j<arr.length){
//     console.log(arr[j]);
//     j++;
// }
/* diffrence between while and do while 
while loop check condition first 
do while loop check condition and run first time even condition is true or false*/
//do while

// do{
//     console.log(arr[j]);
//     j++;
// } while (j < arr.length);

// break and continue

// for (var i = 0; i < arr.length; i++) {
//     if (i == 2) {
//         // break;       when condition is true iteration will stop in break but in
//         //continue the condition iterantion will stop and continue with next
//         continue;
//     }
//     console.log(arr[i]);
// }

let myArr = ["Fan", "Camera", 34, null, true];

// Array methods

// console.log(myArr.length);
// myArr.pop()                     // pop delete last item
// myArr.push("Praduman");         // push used to add items
// myArr.shift();                  // remove first item
// myArr.unshift("Harry")             // unshift add item in starting
// console.log(myArr.unshift("Harry"));  // when we write console with unshift ,it will return
                                    // items with length
// const newLen = myArr.unshift("Harry");
// console.log(newLen);   
// myArr.toString();                       // Convert arrary to string   
// myArr.sort();                           // use for sorting , 
// console.log(myArr);



// String methods in JavaScript

let str11 = "Praduman is a good boy, good good";
// console.log(str11.length);                  // count length of string with space
// console.log(str11.indexOf("is"));           // for searching item in string
// console.log(str11.lastIndexOf("good"));     // for searching item from behind

// console.log(str11.slice(0,7));              // for slicing
d = str11.replace("Praduman","Rajan");
d = d.replace("good","bad")
// console.log(d,str11);


// Date 

let myDate = new Date();
// console.log(myDate);
// console.log(myDate.getTime());              // Show time in seconds
// console.log(myDate.getFullYear());          // Show the current Year
// console.log(myDate.getDay());               // show the number day of the week
// console.log(myDate.getMinutes());           // show the minutes displaying after hours
// console.log(myDate.getHours());             // show the current hours in format of 24


// DOM - (Document Object model)
// DOM Manipulation

let elem = document.getElementById('click');
// console.log(elem);

let elemClass = document.getElementsByClassName('container');
// console.log(elemClass);
// elemClass[0].style.background = 'yellow';        // we can target element 
// elemClass[0].classList.add('bg-primary');           // we can add class by this
// elemClass[0].classList.add('text-success');         // we can add multiple class by this 
// elemClass[0].classList.remove('text-success');      // for removing classes
// console.log(elem.innerHTML);
// console.log(elem.innerText);

// console.log(elemClass[0].innerHTML);
// console.log(elemClass[0].innerText);

// let tn = document.getElementsByTagName('button');
// console.log(tn);

let tn = document.getElementsByTagName('div');
// console.log(tn);
createdElement = document.createElement('p');
createdElement.innerText = "This is a created para";
tn[0].appendChild(createdElement);

createdElement2 = document.createElement('b');
createdElement2.innerText = "This is a created bold";
tn[0].replaceChild(createdElement2,createdElement);

// tn[0].removeChild(createdElement2); //---> removes an element

// Selecting using Query
// sel = document.querySelector('.container');
// console.log(sel);
// sel = document.querySelectorAll('.container');
// console.log(sel);

// Events in JS

// onclick event 
// function clicked(){
//     console.log("The button was clicked");
// }

// // onload
// window.onload = function(){
//     console.log("The page was loaded");
// }

// addEventListener
// firstContainer.addEventListener('click',function(){
//     console.log("clicked on container");
// })

// // mouseover

// firstContainer.addEventListener('mouseover',function(){
//     console.log("Mouse on container");
// })

// // mouseout
// firstContainer.addEventListener('mouseout',function(){
//     console.log("Mouse out of container");
// })

// mouseup
// firstContainer.addEventListener('mouseup',function(){
//     console.log("mouse up when ckicked on container");
// })

// // mousedown
// firstContainer.addEventListener('mousedown',function(){
//     console.log("mouse down when ckicked on container");
// })


// addEventListener 2
// firstContainer.addEventListener('click',function(){
//     document.querySelectorAll('.container')[1].innerHTML = "<b> We have clicked</b>"
//     console.log("The button was clicked");
// })

let prevHTML =  document.querySelectorAll('.container')[1].innerHTML;
// // mouseup 2
// firstContainer.addEventListener('mouseup',function(){
//     document.querySelectorAll('.container')[1].innerHTML = prevHTML;
//     console.log("mouse up when ckicked on container");
// })

// // mousedown 2
// firstContainer.addEventListener('mousedown',function(){
//     document.querySelectorAll('.container')[1].innerHTML = "<b> We have clicked</b>"
//     console.log("mouse down when ckicked on container");
// })


// Arrow function

// function summ(a,b){
//     return a + b;       // Normal function
// }

summ = (a,b)=>{
    return a + b;      // Above code return in Arrow function
}


// SetTimeout  and setinterval

// logKaro = () =>{
//     console.log("I am your log");
// }

logKaro = () =>{
     // automatic change after 2 second
    document.querySelectorAll('.container')[1].innerHTML = "<b>Set interval fired</b>"  
    console.log("I am your log");
}

// setTimeout(logKaro, 2000);        //(first function,time in miliseconds)
// setInterval(logKaro, 2000);       // fired after every 2 second

// use clearInterval(clr)/clearTimeout(clr) to cancel setInterval/setTimeout
// clr = setTimeout(logKaro, 2000);
// clearTimeout(clr);

// clr = setInterval(logKaro, 2000);
// clearTimeout(clr);

// JavaScript LocalStorage
// localStorage.setItem('name', 'Praduman')
// localStorage
// localStorage.getItem('name')
// localStorage.removeItem('name')
// localStorage.clear

// JSON - It is use for exchanging data

// obj = {
//     name: "Praduman",
//     food: "Food",
// }

// jso = JSON.stringify(obj);    // object to string
// console.log(typeof jso);
// console.log(jso);

// parsed = JSON.parse(`{"name":"Praduman","food":"Food"}`)
// console.log(typeof parsed)
// console.log(parsed);


// Template literals - Backticks
a = 35;
// console.log(`this is my ${a}`);
