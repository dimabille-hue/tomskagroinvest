<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {
	register_post_type('buildings', [
		'labels' => [
			'name' => 'Строения',
			'singular_name' => 'Строение',
			'add_new_item' => 'Добавить строение',
			'edit_item' => 'Редактировать строение',
			'menu_name' => 'Строения',
		],
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-store',
		'rewrite' => [
			'slug' => 'buildings',
			'with_front' => false,
		],
		'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'],
	]);
});
