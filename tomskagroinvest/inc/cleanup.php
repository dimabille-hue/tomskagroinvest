<?php

if (!defined('ABSPATH')) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Очистка HEAD
|--------------------------------------------------------------------------
*/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/*
|--------------------------------------------------------------------------
| Удаление wp-embed
|--------------------------------------------------------------------------
*/

add_action(
	'wp_footer',
	function () {

		wp_dequeue_script('wp-embed');

	},
	1
);

/*
|--------------------------------------------------------------------------
| Удаление версии WordPress
|--------------------------------------------------------------------------
*/

add_filter(
	'the_generator',
	'__return_empty_string'
);

/*
|--------------------------------------------------------------------------
| Удаление type="" из script/style
|--------------------------------------------------------------------------
*/

add_filter(
	'style_loader_tag',
	function ($html) {

		return str_replace(
			" type='text/css'",
			'',
			$html
		);

	}
);

add_filter(
	'script_loader_tag',
	function ($html) {

		return str_replace(
			" type='text/javascript'",
			'',
			$html
		);

	}
);

/*
|--------------------------------------------------------------------------
| Поддержка excerpt для страниц
|--------------------------------------------------------------------------
*/

add_action(
	'init',
	function () {

		add_post_type_support(
			'page',
			'excerpt'
		);

	}
);

/*
|--------------------------------------------------------------------------
| Отключение редактора виджетов Gutenberg
|--------------------------------------------------------------------------
*/

add_action(
	'after_setup_theme',
	function () {

		remove_theme_support(
			'widgets-block-editor'
		);

	}
);