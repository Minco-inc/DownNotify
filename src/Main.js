const http = require("http");

const HeartbeatListener = require("./HeartbeatListener.js");
const CheckerListener = require("./CheckerListener.js");

class Main {
	constructor() {
		this.port = 53577;
		this.message = { text: "offline" }; // Default is offline
	}

	main() {
		let hbl = new HeartbeatListener();
		/*hbl.on("online", () => {
			this.message.text = "online";
		});
		hbl.on("offline", () => {
			this.message.text = "offline";
		});*/
		hbl.listen(53577);
		
		let cl = new CheckerListener(this.message);
		cl.listen(53578);
	}
}

module.exports = Main;
