var john = {
    firstName: "John",
    lastName: "Smith",
    birthYear: 1992,
    family: ["Jane","Mark","Bob","Emily"],
    job: "teacher",
    isMarried: false,
    calcAge: function(){
        this.age = 2022 - this.birthYear;
    }
};

console.log(john.calcAge());

// var age = john.calcAge();        // escape this line
// john.age = john.calcAge()

john.calcAge();
console.log(john);
