function calculateAge(BirthYear){
    return 2022 - BirthYear;
}

var ageJohn = calculateAge(1960);
var ageMike = calculateAge(1970);
var ageMary = calculateAge(1980);
console.log(ageJohn, ageMike, ageMary);

function yearsUntilRetirement(year, firstName){
    var age = calculateAge(year);
    var retirement = 65 - age;

    if(retirement > 0){
        console.log(firstName + " retires in " + retirement + " years.");
    } else {
        console.log(firstName + " is already retired.")
    }
}

yearsUntilRetirement(1990, "John");
yearsUntilRetirement(1930, "Mike");