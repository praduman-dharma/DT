// config js
// alert("Hello World");

requirejs.config({
    baseUrl : 'js',   // add the base url so that we don't need to add full path of js files
    paths : {
        angular : [
            'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min','angular-min'
        ],
        swiper : 'swiper',
        // jquery : 'jquery-min',
        jquery : [
            'https://code.jquery.com/jquery-3.6.4.min',
            'jquery-min'
        ],
        test : 'test',
        methods : 'CustomScripts/methods',
        css : 'custom.css'
    },
});

// jquery : 'js/jquery-min' if you didn't used the baseUrl url than need to inlcude like this in paths, 
// and we don't need to write the .js extension in file name.

// ##  we can make use of cdn as well inside our paths, even in cdn links we don't need to include the .js extension at last.
// loading from path > jquery : 'jquery-min',
// loading from cdn > 

//##  now the jqeury will be fetched from the two resources, required would first fetch the first resource that is right now is cdn url and it in some cases its failed to load our jquery from cdn link, then it would load the second which is the local copy of jquery file and you can just have a more another URL right there which is another cdn and then we can write our local file path. we can add as much cdn we wanted.

// means the fallbacks sytem is working with the paths

// after this we can use this libraries in code.