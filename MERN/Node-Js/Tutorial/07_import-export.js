//  Import & Export Module - ES6

// import { simpleMessage } from "./07_firstmodule.mjs";
import { simpleMessage, simpleMessageTwo } from "./07_firstmodule.mjs";
import { simpleMessageThree as simple } from "./07_firstmodule.mjs";
import simpleMessageFour from "./07_firstmodule.mjs";
import * as a2 from "./07_firstmodule.mjs";

// const simple = require('./06_firstmodule.mjs');
// simpleMessage();
// simple();
// simpleMessageFour();

console.log(a2);
console.log(a2.simpleMessage());

