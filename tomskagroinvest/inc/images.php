<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action(

	'after_setup_theme',

	function () {

		add_image_size(

			'project-card',

			700,

			420,

			true

		);

		add_image_size(

			'news-card',

			700,

			420,

			true

		);

		add_image_size(

			'activity-card',

			650,

			420,

			true

		);

		add_image_size(

			'document-cover',

			900,

			600,

			true

		);

		add_image_size(

			'hero-slide',

			1920,

			900,

			true

		);

	}

);

add_filter(

	'big_image_size_threshold',

	'__return_false'

);