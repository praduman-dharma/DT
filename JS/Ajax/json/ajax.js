console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);
let n = document.getElementById("name-id");         // n for name
let r = document.getElementById("roll-id");         // r for roll

function buttonClickHandler() {
    console.log('Button Clicked');
    // Instantiate an xhr object
    const xhr = new XMLHttpRequest();

    // open the object 
    xhr.open('GET','data.json',true);
    xhr.responseType = "json";          
    // What to do when response is ready
    xhr.onload = function () {
        if (this.status === 200) {
            // console.log(this.response);
            // console.log(this.response.name);
            // console.log(this.response.roll);

            n.innerText = this.response.name;
            r.innerText = this.response.roll;
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


