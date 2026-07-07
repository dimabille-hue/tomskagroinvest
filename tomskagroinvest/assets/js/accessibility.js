document.addEventListener('DOMContentLoaded', function () {
	const toggle = document.getElementById('accessibility-toggle');
	const storageKey = 'tai-accessibility-enabled';

	function setEnabled(enabled) {
		document.documentElement.classList.toggle('accessibility-mode', enabled);
		if (toggle) {
			toggle.setAttribute('aria-pressed', enabled ? 'true' : 'false');
		}
		window.localStorage.setItem(storageKey, enabled ? '1' : '0');
	}

	setEnabled(window.localStorage.getItem(storageKey) === '1');

	if (!toggle) {
		return;
	}

	toggle.addEventListener('click', function () {
		setEnabled(!document.documentElement.classList.contains('accessibility-mode'));
	});
});
