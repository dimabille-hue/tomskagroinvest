<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {
	register_post_type('premises', [
		'labels' => [
			'name' => 'Свободные помещения',
			'singular_name' => 'Помещение',
			'add_new_item' => 'Добавить помещение',
			'edit_item' => 'Редактировать помещение',
			'menu_name' => 'Помещения',
		],
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-building',
		'rewrite' => [
			'slug' => 'premises',
			'with_front' => false,
		],
		'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
	]);
});
