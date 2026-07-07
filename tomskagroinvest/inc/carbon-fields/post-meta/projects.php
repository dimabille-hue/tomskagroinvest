<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
	'carbon_fields_register_fields',
	function () {

		Container::make(
			'post_meta',
			'Паспорт инвестиционного проекта'
		)

		->where(
			'post_type',
			'=',
			'projects'
		)

		->add_fields([

			Field::make(
				'text',
				'project_municipality',
				'Муниципальное образование'
			),

			Field::make(
				'text',
				'project_industry',
				'Отрасль'
			),

			Field::make(
				'text',
				'project_cost',
				'Объем инвестиций'
			),

			Field::make(
				'text',
				'project_jobs',
				'Количество рабочих мест'
			),

			Field::make(
				'text',
				'project_investor',
				'Инвестор'
			),

			Field::make(
				'text',
				'project_implementation_period',
				'Срок реализации'
			),

			Field::make(
				'text',
				'project_stage',
				'Стадия реализации'
			),

			Field::make(
				'text',
				'project_area',
				'Площадь земельного участка'
			),

			Field::make(
				'text',
				'project_power',
				'Потребность в электроснабжении'
			),

			Field::make(
				'text',
				'project_gas',
				'Потребность в газоснабжении'
			),

			Field::make(
				'text',
				'project_water',
				'Потребность в водоснабжении'
			),

			Field::make(
				'text',
				'project_sewerage',
				'Потребность в водоотведении'
			),

			Field::make(
				'textarea',
				'project_infrastructure',
				'Инфраструктура'
			),

			Field::make(
				'text',
				'project_latitude',
				'Широта'
			),

			Field::make(
				'text',
				'project_longitude',
				'Долгота'
			),

			Field::make(
				'file',
				'project_passport',
				'Паспорт проекта (PDF)'
			)

			->set_value_type('id'),

			Field::make(
				'complex',
				'project_gallery',
				'Фотогалерея'
			)

			->add_fields([

				Field::make(
					'image',
					'image',
					'Фотография'
				)

			])

		]);

	}
);