export function simpleMessage(){
    console.log("Simple is Complex");
    // return 45;
}

export function simpleMessageTwo(){
    console.log("Simple is Complex, Two");
}

export function simpleMessageThree(){
    console.log("Simple is Complex, Three");
}

export default function simpleMessageFour(){
    console.log("Simple is Complex, Four");
}


// export can be done using below method as well
// export {simpleMessage}  // single export
// export {simpleMessage, simpleMessageTwo}  // multiple export

// module.exports = simpleMessage;
