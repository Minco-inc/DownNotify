const http = require("http");

const Timer = require("./Timer.js");

var events = new Map();
var firstBumped = false;

class HeartbeatListener {
	constructor() {
		this.setDefaultEvents();
		this.server = http.createServer();
		this.isListening = false;
		this.timer = new Timer();
		this.timer.setTime(5000);
	}

	on(eventName, callback) {
		if (this.isListening) throw new Error("Join event before listening!");
		events.set(eventName, callback);
		this.timer.setCallback(this.offline);
	}

	setDefaultEvents() {
		events.set("online", () => {});
		events.set("offline", () => {});
	}

	listen(port) {
		this.server.listen(port, () => {
			console.log("Listening Heartbeat! In port " + port + ".");
			this.isListening = true;
		});

		this.server.on("request", (req, res) => {
			this.bump(req, res);
			res.end("bump");
		});
	}

	bump(req, res) {
		if (!firstBumped) {
			this.firstBump(req, res);
			return;
		} else {
			this.timer.reset();
		}
	}

	firstBump(req, res) {
		this.timer.start();
		this.online();
	}

	online() {
		firstBumped = true;
		events.get("online")();
	}

	offline() {
		firstBumped = false;
		events.get("offline")();
	}
}

module.exports = HeartbeatListener;
