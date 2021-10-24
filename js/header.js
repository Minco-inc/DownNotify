window.onload = () => {
	let menu = document.querySelector(".menu i");
	menu.addEventListener("click", e => {
		setEnable(".black-bg", "on");
		setEnable(".left-menu", "on");
		window.parent.document.querySelector(".header").classList.add("menu");
	});

	let blackBg = document.querySelector(".black-bg");
	blackBg.addEventListener("click", e => {
		setEnable(".black-bg", "off");
		setEnable(".left-menu", "off");
		window.parent.document.querySelecror(".header").classList.remove("menu");
	});

	let user = document.querySelector(".user");
	user.addEventListener("click", e => {
		alert("User");
	});

	window.addEventListener("scroll", e => {
		window.scrollTo({ left: 0 });
	});
};

function setEnable(el, e) {
	let bg = document.querySelector(el);
	switch(e) {
		case "toggle":
			bg.classList.toggle("enable");
			break;
		case "off":
			bg.classList.remove("enable");
			break;
		case "on":
			bg.classList.add("enable");
			break;
		default:
			throw new Error("The first argument must one of on, off, toggle!");
	}
}
