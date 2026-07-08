<?php

if (!defined('ABSPATH')) {
	exit;
}

function tai_breadcrumbs()
{
	if (function_exists('yoast_breadcrumb')) {

		yoast_breadcrumb(
			'<nav class="breadcrumbs">',
			'</nav>'
		);

		return;
	}

	echo '<nav class="breadcrumbs">';

	echo '<a href="' .
		esc_url(home_url('/')) .
		'">Главная</a>';

	if (is_front_page()) {

		echo '</nav>';

		return;
	}

	if (is_home()) {

		echo ' <span>/</span> Новости';

		echo '</nav>';

		return;
	}

	if (is_post_type_archive()) {

		echo ' <span>/</span> ';

		post_type_archive_title();

		echo '</nav>';

		return;
	}

	if (is_singular()) {

		$post_type = get_post_type();

		if ($post_type !== 'page') {

			$obj = get_post_type_object($post_type);

			if ($obj) {

				echo ' <span>/</span> ';

				echo '<a href="' .
					esc_url(
						get_post_type_archive_link(
							$post_type
						)
					) .
					'">';

				echo esc_html(
					$obj->labels->name
				);

				echo '</a>';
			}
		}

		echo ' <span>/</span> ';

		the_title();

		echo '</nav>';

		return;
	}

	if (is_page()) {

		echo ' <span>/</span> ';

		the_title();

		echo '</nav>';

		return;
	}

	if (is_search()) {

		echo ' <span>/</span> Поиск';

		echo '</nav>';

		return;
	}

	if (is_404()) {

		echo ' <span>/</span> Ошибка 404';

		echo '</nav>';

		return;
	}

	echo '</nav>';
}