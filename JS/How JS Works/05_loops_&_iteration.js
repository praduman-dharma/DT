// console.log("Hello");

// While loop
/*

let val = 1;

while(val <= 10){
    console.log("Number:"+ val);
    val++;
}

*/

// Do While loop
// console.log("### Do While loop ###")

/*

val = 1;
do{
    console.log("Number:" + val);
    val++;
} while(val <= 10);

*/

// for loop
// Initialization ; Conditon ; Expression

/*

for(let i = 0; i < 10; i++){
    console.log("Number:" + i);
}

*/

// For in loop  - this loops mostly use in object

/*

let person = {
    name: "John",
    age: 24,
    job: "Software Developer",
    city: "Ahmedabad"
}

for(let x in person){
    console.log(x + " is " + person[x]);
}

*/

// For of loop - this loops mostly use in array

let cars = new Array("BMW", "Volvo", "Audi");

for(let i in cars){
    console.log(cars[i])
}

