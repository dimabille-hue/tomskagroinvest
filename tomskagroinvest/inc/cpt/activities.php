<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	register_post_type('activities', [

		'labels' => [

			'name' => 'Направления деятельности',
			'singular_name' => 'Направление',
			'menu_name' => 'Направления'

		],

		'public' => true,

		'show_ui' => true,

		'show_in_rest' => true,

		'has_archive' => true,

		'menu_icon' => 'dashicons-chart-area',

		'rewrite' => [
			'slug' => 'activities',
			'with_front' => false
		],

		'supports' => [
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'page-attributes'
		]

	]);

});