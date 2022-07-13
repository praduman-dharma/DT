// this keyword

// calculateAge(1985);

// function calculateAge(year){
//     console.log(2022 - year);
//     console.log(this);
// }

var john = {
    name: "John",
    yearofBirth: 1990,
    calculateAge: function(){
        console.log(this);
        console.log(2016- this.yearofBirth);

        /*
        function innerFunction(){
            console.log(this);
        }
        innerFunction();
        */
    }
}


john.calculateAge();

var mike = {
    name: "Mike",
    yearOfBirth: 1984
};

mike.calculateAge = john.calculateAge;

mike.calculateAge();
