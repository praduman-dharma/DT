// alert("Hello World");
let demo = "helllllo";

// define example
    // define(['','','',''],function(){

    // });
// how to use jquery here , than we need to make define function, so this define would accept some dependencies which it would work on and then finally a callback funtion, which would be fired when all of dependencies files are loaded

// define(['jquery'],function($){
//         $("body").css("background","cyan");
// });

// now in define we have to use the name that we given in the configuration file,
// where we used jquery for jquery library than we will use the jquery in define, if we given a name abc to jquery files than we need to use abc in define function.

// now in this file we can use jquery using $ (dollar sign)


// ## we can pass as much needed dependencies we needed
// Ex. >

// define(['jquery','swiper','angular'],function($){
//     $("body").css("background","cyan");
// });

// ## AMD

define(['jquery','methods'],function($,methods){
    $('#clickMe').click(function(){
        methods.showAlert("I was Clicked!");
    })
});