// Objects and Properties

// object literal

var john = {
    firstName: "John",
    lastName: "Smith",
    birthYear: 1998,
    family: ["Jane","Mark","Bob","Emily"],
    job: "teacher",
    isMarried: false
};

// Retrieve data from Object

// console.log(john);
console.log(john.firstName);
console.log(john["lastName"]);
var x = "birthYear";
console.log(john[x]);

// changing data in object

john.job = "designer";
john["isMarried"] = true;      // another way of changing
console.log(john);


// Another way of creating object-just like array
// new object syntax

var jane = new Object();
jane.firstName = "Jane";
jane.birthYear = 1958;
jane["lastName"] = "Smith";
console.log(jane);