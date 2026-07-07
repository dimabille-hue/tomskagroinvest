<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	register_post_type('documents', [

		'labels' => [

			'name'               => 'Документы',
			'singular_name'      => 'Документ',
			'add_new'            => 'Добавить документ',
			'add_new_item'       => 'Добавить документ',
			'edit_item'          => 'Редактировать документ',
			'new_item'           => 'Новый документ',
			'view_item'          => 'Просмотр документа',
			'search_items'       => 'Поиск документов',
			'menu_name'          => 'Документы'

		],

		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'has_archive'         => true,

		'menu_icon'           => 'dashicons-media-document',

		'rewrite' => [
			'slug' => 'documents',
			'with_front' => false
		],

		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'page-attributes'
		]

	]);

});