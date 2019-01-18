function transition() {
	document.querySelector('.animation-left').classList.toggle('visible');
	document.querySelector('.animation-top').classList.toggle('visible');
}

window.setTimeout(transition, 300);

