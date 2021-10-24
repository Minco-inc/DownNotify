window.onload = () => {
	document.addEventListener('touchmove', e => {
		e.preventDefault();
	}, { passive: false });

	document.addEventListener('touchstart', e => {
		if (e.touches.length > 1) {
			e.preventDefault();
		}
	}, false);

	var lastTouchEnd = 0;
	document.addEventListener('touchend', e => {
		var now = (new Date()).getTime();
		if (now - lastTouchEnd <= 300) {
			e.preventDefault();
		}
		lastTouchEnd = now;
	}, false);

	var viewport = document.querySelector('meta[name="viewport"]');
	viewport.setAttribute('content', "initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0");
};
