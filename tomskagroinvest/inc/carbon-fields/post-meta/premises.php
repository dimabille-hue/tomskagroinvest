<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
	Container::make('post_meta', 'Параметры помещения')
		->where('post_type', '=', 'premises')
		->add_fields([
			Field::make('select', 'premise_building', 'Строение')
				->set_options(function () {
					$buildings = get_posts([
						'post_type' => 'buildings',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC',
					]);

					$options = ['' => 'Не выбрано'];

					foreach ($buildings as $building) {
						$options[$building->ID] = $building->post_title;
					}

					return $options;
				}),
			Field::make('text', 'premise_area', 'Площадь, м²')->set_attribute('type', 'number'),
			Field::make('text', 'premise_price', 'Цена за м²')->set_attribute('type', 'number'),
			Field::make('text', 'premise_floor', 'Этаж'),
			Field::make('text', 'premise_number', 'Номер помещения'),
			Field::make('gallery', 'premise_gallery', 'Фотографии'),
			Field::make('complex', 'premise_documents', 'Формы документов')
				->add_fields([
					Field::make('text', 'title', 'Название'),
					Field::make('file', 'file', 'Файл'),
				]),
		]);
});
