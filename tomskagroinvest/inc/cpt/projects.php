<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	register_post_type('projects', [

		'labels' => [

			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new_item' => 'Добавить проект',
			'edit_item' => 'Редактировать проект',
			'menu_name' => 'Проекты'

		],

		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,

		'has_archive' => true,

		'menu_icon' => 'dashicons-building',

		'rewrite' => [
			'slug' => 'projects',
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