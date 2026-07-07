<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	register_post_type('events', [

		'labels' => [

			'name' => 'Новости и события',
			'singular_name' => 'Новость',
			'menu_name' => 'Новости'

		],

		'public' => true,

		'show_ui' => true,

		'show_in_rest' => true,

		'has_archive' => true,

		'menu_icon' => 'dashicons-megaphone',

		'rewrite' => [
			'slug' => 'news',
			'with_front' => false
		],

		'supports' => [
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'author',
			'page-attributes'
		]

	]);

});