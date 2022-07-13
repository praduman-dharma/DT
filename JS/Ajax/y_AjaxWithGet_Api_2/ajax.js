console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);
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
            // console.log(this.response);
            x = this.response;
            for(i = 0; i<x.length; i++){
                console.log(x[i].userId);
                console.log(x[i].id);
                console.log(x[i].title);
                console.log(x[i].body);
            }
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


