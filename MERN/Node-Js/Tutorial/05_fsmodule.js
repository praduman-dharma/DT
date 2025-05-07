const fs = require('fs');


// Read File

// asynchronous processing
// fs.readFile('05_05_file.tx', 'utf8', (err, data) => {
//     console.log(err, data);
// });


// synchronous processing

const data = fs.readFileSync('05_file.tx');
// console.log(data);
// console.log(data.toString());  // to view data in string format


// Write file

// asynchronous processing
// fs.writeFile('05_file2.tx', 'This is a data', () => {
//     console.log("written to the file");
// });

// synchronous processing

const b = fs.writeFileSync('05_file2.tx', 'This is a data2');
console.log(b);

console.log("Finished reading file");
