var firstName = "John";
var civilStatus = "single";

if(civilStatus === "married"){
    console.log(firstName + " is married");
} else {
    console.log(firstName + " will hope fully marry soon ");
}

// You can even directly assign boolean value in conditions

var isMarried = true;
if(isMarried){
    console.log(firstName + " is married");
} else {
    console.log(firstName + " will hope fully marry soon ");
}

// 

var markWeight = 70;
var markHeight = 1.80;

var johnWeight = 60;
var johnHeight = 1.70;

 var bmiMark = markWeight / (markHeight* markHeight);
 console.log(bmiMark);

 var bmiJohn = johnWeight / (johnHeight* johnHeight);
 console.log(bmiJohn);

 if(bmiMark > bmiJohn){
     console.log(" Mark BMI is higher than John BMI");
 } else {
    console.log(" John BMI is higher than Mark BMI");
 }

