// # Map

// const number = [10, 20, 30];

// const result = number.map((n) => {
//     // return n;
//     // return n + 10;
//     return(
//         `<li>${n}</li>`
//     )
// });

// console.log(result);



// # Filter

// const number = [10, 20, 30, 40, 50, 60];

// const result = number.filter((n) => n > 30);
// const result = number.filter((n) => n > 30 && n < 60);
// const result = number.filter((n) => n != 30);



// console.log(result);


// # Example 1

// const category = ['mobiles', 'laptops', 'smartWatch', 'headphones'];

// // const result = category.filter((cat) => cat === 'mobiles');
// const result = category.filter((cat) => cat !== 'mobiles');


// console.log(result);


// const mobiles = [
//     {mobileName: 'Samsung F2', price: '10000'},
//     {mobileName: 'sony xperia', price: '80000'},
//     {mobileName: 'oneplus', price: '35000'},
//     {mobileName: 'iphone', price: '100000'},
//     {mobileName: 'poco', price: '25000'},
//     {mobileName: 'redmi', price: '15000'},
// ];

// // const result = mobiles.filter((p) => p.price > 25000);
// // const result = mobiles.filter((p) => p.price > 50000);
// const result = mobiles.filter((p) => p.price != 25000);


// console.log(result);


// # Reduce filter

const number = [1,2,3,4,5,6];

// num1 = 1, num2 = 2, result = 3;
// num1 = 3, num2 = 3, result 6;
const result = number.reduce((num1, num2) => {
    // return num1 + num2;
    return num1 - num2;
});


console.log(result);

