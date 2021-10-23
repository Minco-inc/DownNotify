const fs = require("fs");
const Heartbeat = require("./Heartbeat.js");

class HeartbeatReader {
	constructor() {
		
	}

	readdirSync(path) {
		let files = fs.readdirSync(path);

		let heartbeats = [];
		files.forEach(file => {
			let config = require(path + file);
			heartbeats.push(new Heartbeat(config));
		});
		return heartbeats;
	}
}

module.exports = HeartbeatReader;
