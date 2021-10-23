const Timer = require("./Timer.js");

class Heartbeat {
	constructor(config) {
		this.name = config.name;
		this.code = config.code;
		this.events = config.events;
		this.status = "offline";

		this.timer = new Timer();
		this.timer.setCallback(this.offline, this);
	}

	bump(req, res) {
		let code = req.url.substr(1);
		if (this.code.toString() !== code) return;
		this.timer.reset();
		if (this.status == "offline") this.online();
	}

	online() {
		this.events.online();
		this.status = "online";
	}

	offline(that) { // I passed this class to Timeout class as that
		that.events.offline();
		that.status = "offline";
	}
}

module.exports = Heartbeat;
