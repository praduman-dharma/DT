RequireJS is a JavaScript file and module loader. It is optimized for in-browser use, but it can be used in other JavaScript environments, like Rhino and Node. Using a modular script loader like RequireJS will improve the speed and quality of your code.

In simple > Require js can packages all of your javascript in one javascript file, and basically makes it easier for you to manage, how the javascript files are loading

Another thing we need require with require js is "data-main" attribute.
The data-main attribute will accept the path as a string and it would basically load the configuration file of our requireJS application.

    <script data-main="js/config" src="require-2.3.6.js"></script>

In data-main attribute give the path to config.js, not that we don't need to write the extension name after file, becuase the require js is design for work with javascript file, so it will automatically knows that will .js extension.


 Than the third step is to inisilize your require js. for do that simple right the requrie function inside script.

 <script>
    require(['config'],function(){
        // all of your code here..
    });
</script>