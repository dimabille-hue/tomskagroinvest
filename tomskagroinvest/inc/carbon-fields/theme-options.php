<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Container;

add_action(
	'carbon_fields_register_fields',
	function () {

		$theme_options = Container::make(
			'theme_options',
			'Настройки сайта'
		);

		require get_template_directory()
			. '/inc/carbon-fields/tabs/home.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/company.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/activities.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/projects.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/contacts.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/header.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/footer.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/social.php';

		require get_template_directory()
			. '/inc/carbon-fields/tabs/seo.php';

	}
);