<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
	'carbon_fields_register_fields',
	function () {

		Container::make(
			'post_meta',
			'Направление деятельности'
		)

		->where(
			'post_type',
			'=',
			'activities'
		)

		->add_fields([

			Field::make(
				'image',
				'activity_icon',
				'Иконка'
			),

			Field::make(
				'image',
				'activity_banner',
				'Баннер'
			),

			Field::make(
				'textarea',
				'activity_short',
				'Краткое описание'
			),

			Field::make(
				'text',
				'activity_order',
				'Порядок отображения'
			)

		]);

	}
);