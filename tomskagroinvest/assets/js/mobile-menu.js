document.addEventListener(

	'DOMContentLoaded',

	function () {

		const button = document.querySelector(

			'.mobile-menu-toggle'

		);

		const menu = document.querySelector(

			'.mobile-menu'

		);

		if (!button || !menu) {

			return;

		}

		button.addEventListener(

			'click',

			function () {

				button.classList.toggle(

					'active'

				);

				menu.classList.toggle(

					'active'

				);

				menu.setAttribute(

					'aria-hidden',

					menu.classList.contains('active') ? 'false' : 'true'

				);

				document.body.classList.toggle(

					'menu-open'

				);

			}

		);

	}

);
