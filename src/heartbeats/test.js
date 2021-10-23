const DisNotify = require("disnotify");

module.exports = {
	name: "MKb",
	code: 1,
	events: {
		online: () => {
			new DisNotify({ name: "DownNotify", text: "MKb is online" }).send();
		},
		offline: () => {
			new DisNotify({ name: "DownNotify", text: "MKb is offline" }).send();
		}
	}
};
