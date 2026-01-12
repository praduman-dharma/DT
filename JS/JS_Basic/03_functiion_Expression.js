// function statements and Expression.

var whatDoYouDo = function  (job, firstName){
    switch(job){
        case "teacher":
            return firstName + " teaches kids how to code.";
        case "driver":
            return firstName + " drives cab in India.";
        case "designer":
            return firstName + " designs beautiful websites.";
        default:
            return firstName + " does something else.";
    }
}

console.log(whatDoYouDo("teacher","John"));
console.log(whatDoYouDo("driver","Mike"));
console.log(whatDoYouDo("Criminal","Mary"));