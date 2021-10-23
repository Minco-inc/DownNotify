const http = require("http");
const Heartbeat = require("./Heartbeat.js");
const HeartbeatReader = require("./HeartbeatReader.js");

const hbrDir = __dirname + "/heartbeats/";

let beats = [];

let evts = new Map();
evts.set("online", () => console.log("online"));
evts.set("offline", () => console.log("offline"));
let hbt = new Heartbeat({
	name: "Test",
	code: 56,
	events: evts
});
beats.push(hbt);

class HeartbeatListener {
	constructor() {
		this.server = http.createServer();
		this.isListening = false;

		let hbr = new HeartbeatReader();
		this.beats = hbr.readdirSync(hbrDir);
	}

	listen(port) {
		this.server.listen(port, () => {
			console.log("Listening Heartbeat!");
			this.isListening = true;
		});

		this.server.on("request", (req, res) => {
			this.beats.forEach(beat => {
				beat.bump(req, res);
			});
			res.end("bump");
		});
	}
}

module.exports = HeartbeatListener;
