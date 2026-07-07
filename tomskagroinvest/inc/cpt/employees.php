<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	register_post_type('employees', [

		'labels' => [

			'name' => 'Руководство',

			'singular_name' => 'Сотрудник'

		],

		'public' => true,

		'show_in_rest' => true,

		'menu_icon' => 'dashicons-businessperson',

		'supports' => [

			'title',

			'thumbnail',

			'page-attributes'

		]

	]);

});