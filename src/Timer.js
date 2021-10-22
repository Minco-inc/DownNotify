class Timer {
	constructor() {
		this.time = 5000;
	}

	setTime(ms) {
		this.time = ms;	
	}

	setCallback(callback) {
		this.callback = callback;
	}

	start() {
		this.timeout = setTimeout(this.callback, this.time);
	}

	stop() {
		clearTimeout(this.timeout);
	}

	reset() {
		this.stop();
		this.start();
	}
}

module.exports = Timer;
