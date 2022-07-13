console.log('Ajax tutorial');

let fetchbtn = document.getElementById('btnajax');
fetchbtn.addEventListener('click', buttonClickHandler);
let data = document.getElementById("data");       
       

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
            x = xhr.response.getElementsByTagName("student");
            for(i=0 ;i<x.length; i++){
                data.innerHTML += "<p>" + x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue + "</p>" +  "<p>" + x[i].getElementsByTagName("roll")[0].childNodes[0].nodeValue + "</p>" + "<br>"
            }
        }
        else {
            console.log('Some error occured');
        }
    }

    // Send the request
    xhr.send();

}