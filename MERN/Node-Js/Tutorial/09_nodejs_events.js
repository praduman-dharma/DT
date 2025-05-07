const EventEmitter = require('node:events');

class MyEmitter extends EventEmitter {}

const myEmitter = new MyEmitter();
myEmitter.on('event', () => {
  console.log('an event occurred!');
});
myEmitter.emit('event');


// another example
myEmitter.on('waterFull', () => {
    console.log('Please turn off the motor!');
    setTimeout(() => {
        console.log('please turn off the motor!, Its a gentle reminder');
    }, 3000);
});

console.log('The script is running');
console.log('The script is still running');

myEmitter.emit('waterFull');
