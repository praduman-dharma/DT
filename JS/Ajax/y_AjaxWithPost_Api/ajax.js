console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);
let table = document.getElementById('table');


function buttonClickHandler() {
    console.log('Button Clicked');
    // Instantiate an xhr object
    const xhr = new XMLHttpRequest();

    // open the object 
    xhr.open('POST','http://dummy.restapiexample.com/api/v1/create',true);
    xhr.responseType = "json";          
    // What to do when response is ready
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(this.response);
            document.getElementById("info").innerText = "Data Inserted";
        }
        else {
            console.log('Some error occured');
        }
    }

    // Send the request
    mydata = '{"name":"RahulRajput","salary":"105","age":"23"}';
    xhr.send(mydata);

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


