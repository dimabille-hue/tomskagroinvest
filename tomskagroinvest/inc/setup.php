<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action(

	'after_setup_theme',

	function () {

		add_theme_support('title-tag');

		add_theme_support('post-thumbnails');

		add_theme_support('custom-logo', [

			'height' => 120,

			'width' => 320,

			'flex-height' => true,

			'flex-width' => true

		]);

		add_theme_support('responsive-embeds');

		add_theme_support('editor-styles');

		add_theme_support(

			'html5',

			[

				'search-form',

				'gallery',

				'caption',

				'style',

				'script'

			]

		);

		register_nav_menus([

			'primary' => 'Главное меню',

			'footer' => 'Меню подвала'

		]);

	}

);