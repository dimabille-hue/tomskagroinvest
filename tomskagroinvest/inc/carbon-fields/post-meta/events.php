<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
	'carbon_fields_register_fields',
	function () {

		Container::make(
			'post_meta',
			'Параметры новости'
		)

		->where(
			'post_type',
			'=',
			'events'
		)

		->add_fields([

			Field::make(
				'date',
				'event_date',
				'Дата публикации'
			)
			->set_storage_format('Y-m-d')
			->set_input_format('d.m.Y'),

			Field::make(
				'text',
				'event_source',
				'Источник'
			),

			Field::make(
				'text',
				'event_location',
				'Место проведения'
			),

			Field::make(
				'checkbox',
				'event_featured',
				'Показывать на главной'
			),

			Field::make(
				'complex',
				'event_gallery',
				'Фотогалерея'
			)

			->add_fields([

				Field::make(
					'image',
					'image',
					'Фото'
				)

			])

		]);

	}
);