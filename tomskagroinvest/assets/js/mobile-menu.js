document.addEventListener('DOMContentLoaded', function () {
	const button = document.querySelector('.mobile-menu-toggle');
	const menu = document.querySelector('.mobile-menu');
	const links = menu ? menu.querySelectorAll('a') : [];

	if (!button || !menu) {
		return;
	}

	function setMenuOpen(isOpen) {
		button.classList.toggle('active', isOpen);
		button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		menu.classList.toggle('active', isOpen);
		menu.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
		document.body.classList.toggle('menu-open', isOpen);
	}

	button.setAttribute('aria-expanded', 'false');
	button.setAttribute('aria-controls', 'mobile-menu');
	menu.setAttribute('id', 'mobile-menu');

	button.addEventListener('click', function () {
		setMenuOpen(!menu.classList.contains('active'));
	});

	links.forEach(function (link) {
		link.addEventListener('click', function () {
			setMenuOpen(false);
		});
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			setMenuOpen(false);
		}
	});
});
