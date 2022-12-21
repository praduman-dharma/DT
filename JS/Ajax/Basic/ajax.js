console.log('Ajax tutorial');

let fetchbtn = document.getElementById('fetchbtn');
fetchbtn.addEventListener('click', buttonClickHandler);
let dt = document.getElementById("data");

function buttonClickHandler() {
    console.log('You have clicked the fetchbtn');
    // Instantiate an xhr object
    const xhr = new XMLHttpRequest();

    // open the object 
    xhr.open('GET','doc.txt',true);
    // xhr.open('GET', 'https://jsonplaceholder.typicode.com/todos/1', true);

    // What to do on progress (optional)
    xhr.onprogress = function () {
        console.log('On progress');
    }

    // xhr.onreadystatechange = function(){
    //     console.log('ready state is', xhr.readyState)  //old version of onload
    // }

    // What to do when response is ready
    xhr.onload = function () {
        if (this.status === 200) {

            // console.log(this.responseText);          // for printing on console
            dt.innerText = this.responseText;           // for printing on page

        }
        else {
            console.log('Some error occured')
        }
    }

    // Send the request
    xhr.send();

}


