const http = require("http");

class CheckerListener {
	constructor(msg) {
		this.msg = msg;
		this.server = http.createServer();	
	}

	listen(port) {
		this.server.listen(port, () => {
			console.log("Checker Website Listening!");
		});
		this.server.on("request", (req, res) => {
			res.end(this.msg.text);
		});
	}
}

module.exports = CheckerListener;
