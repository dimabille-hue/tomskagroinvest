<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
	Container::make('post_meta', 'Информация о строении')
		->where('post_type', '=', 'buildings')
		->add_fields([
			Field::make('text', 'building_address', 'Адрес строения'),
			Field::make('text', 'building_floor_count', 'Количество этажей'),
			Field::make('text', 'building_total_area', 'Общая площадь'),
		]);
});
