<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	register_post_type('partners', [

		'labels' => [

			'name'               => 'Партнёры',
			'singular_name'      => 'Партнёр',
			'menu_name'          => 'Партнёры',
			'add_new'            => 'Добавить',
			'add_new_item'       => 'Добавить партнёра',
			'edit_item'          => 'Редактировать партнёра',
			'new_item'           => 'Новый партнёр',
			'view_item'          => 'Просмотр',
			'search_items'       => 'Поиск',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'В корзине нет'

		],

		'public' => true,

		'publicly_queryable' => false,

		'has_archive' => false,

		'show_in_rest' => true,

		'menu_icon' => 'dashicons-groups',

		'supports' => [

			'title',

			'thumbnail',

			'page-attributes'

		]

	]);

});