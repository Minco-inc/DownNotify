const Timer = require("./Timer.js");
let timer = new Timer();
timer.setTime(10000);
timer.setCallback(() => console.log("timeout"));
timer.start();
setTimeout(() => {
	console.log("reset");
	timer.reset();
}, 3000);
