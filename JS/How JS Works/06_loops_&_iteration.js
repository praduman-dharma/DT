// loops and iteration

// for loop

// for(let i = 1; i < 30; i += 2){
//     console.log(i);
// }

// i = 0, 0 < 10 true, log i to console, i++
// i = 1, 1 < 10 true, log i to the console, i++
// ...
// i = 9, 9 < 10 true, log i to the console, i++
// i = 10, 10 < 10 false, exit the loop!

var john = ["John", "Smith", 1990, "designer", false];

/*

for(let i = 0; i < john.length; i++){
    console.log(john[i]);
}

*/
// while loop

/*

let i = 0;
while(i < john.length){
    console.log(john[i]);
    i++;
}

*/

// do while loop

/*

let i = 0;
do{
    console.log(john[i]);
    i++
}while(i < john.length)

*/

// Break and continue statement

var john = ["John", "Smith", 1990, "designer", false];

// continue - condition true hoga to current iteration ko skip kardega
/*

for(let i = 0; i < john.length; i++){
    if(typeof john[i] !== "string") continue;
    console.log(john[i]);
}

*/

// break - condition true hoga to loop ko break kardega
/*

for(let i = 0; i < john.length; i++){
    if(typeof john[i] !== "string") break;
    console.log(john[i]);
}

*/

// Looping backwards

for(var i = john.length - 1; i >=0; i--){
    console.log(john[i]);
}