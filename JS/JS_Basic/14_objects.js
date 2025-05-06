const person = {
    Name: 'John',
    age: 23,
    email: 'john@gmail.com',
    phoneNumber: '1234567890'
}

// console.log(person);
// console.log(person.name);
// console.log(person.email, person.phoneNumber);


// Destructuring
const {Name, age, email} = person;
// console.log(Name);
// console.log(email);


// # spread operator ... used to copy data from another object/array
const person2 = {...person, Name: 'Ramesh', age: 25}

// console.log(person2);


const number = [10, 20, 30];
const number2 = [...number, 40, 50];

console.log(number);
console.log(number2);
