//  Import & Export Module - Common JS

// when single variable is exported from file than we can store it in any variable name

// const name = require('./06_student.js');
// console.log(name);


// when multiple variable is exported from file than variable name should match with exported variable names


const {nm, marks} = require('./06_student.js');
console.log(nm);
console.log(marks(40, 45));




