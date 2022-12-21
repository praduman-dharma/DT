console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);
let n1 = document.getElementById("name-id1");         // n1 for name
let r1 = document.getElementById("roll-id1");         // r1 for roll
let n2 = document.getElementById("name-id2");         
let r2 = document.getElementById("roll-id2");         

function buttonClickHandler() {
    console.log('Button Clicked');
    // Instantiate an xhr object
    const xhr = new XMLHttpRequest();

    // open the object 
    xhr.open('GET','data.xml',true);  
    xhr.responseType = "document";
    // What to do when response is ready
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(this.response);
            console.log(this.response.getElementsByTagName("student"));
            console.log(this.response.getElementsByTagName("student")[0]);
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("name"));
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("name")[0]);
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("name")[0].childNodes[0]);
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("name")[0].childNodes[0].nodeValue);

            // showing name on screen
            n1.innerText = this.response.getElementsByTagName("student")[0].getElementsByTagName("name")[0].childNodes[0].nodeValue;


            console.log(this.response.getElementsByTagName("student")[1]);
            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("name"));
            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("name")[0]);
            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("name")[0].childNodes[0]);
            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("name")[0].childNodes[0].nodeValue);

            // showing name on screen
            n2.innerText = this.response.getElementsByTagName("student")[1].getElementsByTagName("name")[0].childNodes[0].nodeValue;




            // Roll
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("roll")[0]);
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("roll")[0].childNodes[0]);
            console.log(this.response.getElementsByTagName("student")[0].getElementsByTagName("roll")[0].childNodes[0].nodeValue);

            // showing roll on screen
            r1.innerText = this.response.getElementsByTagName("student")[0].getElementsByTagName("roll")[0].childNodes[0].nodeValue;


            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("roll")[0]);
            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("roll")[0].childNodes[0]);
            console.log(this.response.getElementsByTagName("student")[1].getElementsByTagName("roll")[0].childNodes[0].nodeValue);

            // showing roll on screen
            r2.innerText = this.response.getElementsByTagName("student")[1].getElementsByTagName("roll")[0].childNodes[0].nodeValue;


        }
        else {
            console.log('Some error occured');
        }
    }

    // Send the request
    xhr.send();

}