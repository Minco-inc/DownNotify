class Timer {
	constructor() {
		this.time = 5000;
		this.timeout = 0;
	}

	setTime(ms) {
		this.time = ms;	
	}

	setCallback(callback, superclass) {
		this.callback = callback;
		this.superclass = superclass;
	}

	start() {
		this.timeout = setTimeout(() => this.callback(this.superclass), this.time);
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
