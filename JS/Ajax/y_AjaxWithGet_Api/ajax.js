console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);

let title = document.getElementById("title");
let body = document.getElementById("body");

function buttonClickHandler() {
    console.log('Button Clicked');
    // Instantiate an xhr object
    const xhr = new XMLHttpRequest();

    // open the object 
    xhr.open('GET','https://jsonplaceholder.typicode.com/posts/1',true);
    xhr.responseType = "json";          
    // What to do when response is ready
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(this.response);
            console.log(this.response.userId);
            console.log(this.response.id);
            console.log(this.response.title);
            console.log(this.response.body);
            title.innerText = this.response.title;
            body.innerText = this.response.body;
        }
        else {
            console.log('Some error occured');
        }
    }

    // Send the request
    xhr.send();

}

// // json.parse method

// function buttonClickHandler() {
//     console.log('Button Clicked');
//     // Instantiate an xhr object
//     const xhr = new XMLHttpRequest();

//     // open the object 
//     xhr.open('GET','data.json',true);  
//     // What to do when response is ready
//     xhr.onload = function () {
//         if (this.status === 200) {
//             console.log(this.response);
//             let obj = JSON.parse(this.response);
//             console.log(obj);
//             console.log(obj.name);
//             console.log(obj.roll);

//             n.innerText = obj.name;             // displaying on the screen
//             r.innerText = obj.roll;
//         }
//         else {
//             console.log('Some error occured');
//         }
//     }

//     // Send the request
//     xhr.send();

// }


