console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);
let table = document.getElementById('table');


function buttonClickHandler() {
    console.log('Button Clicked');
    // Instantiate an xhr object
    const xhr = new XMLHttpRequest();

    // open the object 
    xhr.open('GET','https://jsonplaceholder.typicode.com/posts',true);
    xhr.responseType = "json";          
    // What to do when response is ready
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(this.response);
            x = this.response;
            for(i = 0; i<x.length; i++){
                table.innerHTML += "<tr><td>" + x[i].id + "</td><td>" + x[i].title + 
                "</td><td>" + x[i].body + "</td></tr>";
            }
        }
        else {
            console.log('Some error occured');
        }
    }

    // Send the request
    xhr.send();

}