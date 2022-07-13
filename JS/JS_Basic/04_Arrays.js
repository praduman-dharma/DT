// Arrays

var names = ["John", "Mike", "Mary"];
var year = new Array(1990,1980,1985);

console.log(names);
console.log(names.length);          // count length of array.

// console.log(names[0]);              // Retrieve data from array  //
// console.log(names[1]);
// console.log(names[2]);

names[1] = "Ben";                   // changing value of array.//
console.log(names);

names[names.length] = "Jane";       // Adding values.
console.log(names);

// Different Data types

var john = ["John", "Smith", 1990, "teacher", false];

john.push("blue");                  // add item in last
john.unshift("Mr.")                 // add item at beginning
console.log(john);
john.pop();                        // remove last item
console.log(john);
john.shift();                      // remove first item
console.log(john);

console.log(john.indexOf(1990));        // return the index position of 1990.
console.log(john.indexOf("teacher"));   // return the index position of techear.
console.log(john.indexOf(19));          // return -1 if value is not store in array.


// ternory operator 

var isDesigner = john.indexOf("designer") === -1? "John is Not a designer" : "John is a designer";

console.log(isDesigner);