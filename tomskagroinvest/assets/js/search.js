document.addEventListener('DOMContentLoaded', function () {
	const forms = document.querySelectorAll('form[role="search"], .header-search form');

	forms.forEach(function (form) {
		form.addEventListener('submit', function (event) {
			const input = form.querySelector('input[name="s"]');

			if (!input || input.value.trim()) {
				return;
			}

			event.preventDefault();
			input.focus();
		});
	});
});
