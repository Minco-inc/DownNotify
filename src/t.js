const fs = require("fs");
const HBL = require("./HeartbeatReader.js");

let e = fs.readdirSync("./heartbeats/");
console.log(e);

let h = new HBL();
let e1 = h.readdirSync("./heartbeats/");
console.log(e1);

