// console.log('Element Selectors');
// DOM

let a = document;               // document is object of html 
a = document.all;               // for selecting all html
a = document.body;              // for selecting body part of page
a = document.head;              // for selecting head part of page
a = document.forms;             // for selecting forms in page
a = document.forms[0]           // for selecting first of page   use indexing
a = document.images;            // for selecting images of page
a = document.links;             // for selecting links of page
a = document.scripts;           // for selecting images of page


// console.log(a);

/*

Element selectors
1. Single element selector
2. Multi element selector

*/

// 1. Single element selector
let element = document.getElementById('myfirst');
// element = element.className;
// element = element.childNodes;
// element = element.parentNode;
element.style.color = 'red';
element.innerText = "Bye World";
element.innerHTML = '<b>Bye World</b>';

// console.log(element);
// console.log(element.innerText);              // for viewing text of element
// console.log(element.innerHTML);              // for viewing html of element


let sel = document.querySelector('#myfirst');   //  selecting using id name
sel = document.querySelector('.child');         // selecting using class name
sel = document.querySelector('b');              // selecting using tag name   
sel = document.querySelector('div');            // selecting using tag name  but remember this only select first
                                                // div element  
sel.style.color = 'green';
// console.log(sel);       


// 2. Multi element selector
let elems = document.getElementsByClassName('child');
elems = document.getElementsByClassName('container');
// console.log(elems);
// console.log(elems);
// console.log(elems[0].getElementsByClassName('child'));

elems = document.getElementsByTagName('div');
console.log(elems);

for (let index = 0; index < elems.length; index++) {                // using for loop
    const element = elems[index];
    console.log(element);
    element.style.color = 'blue';
    
}

// Array.from(elems).forEach(function(element){                     // using foreach
//     console.log(element);
// }
// )

// Array.from(elems).forEach(element => {                           // using forech arrow function
//     console.log(element);
//     element.style.color = 'blue';
// });


