<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
	'carbon_fields_register_fields',
	function () {

		Container::make(
			'post_meta',
			'Сотрудник'
		)

		->where(
			'post_type',
			'=',
			'employees'
		)

		->add_fields([

			Field::make(
				'text',
				'employee_position',
				'Должность'
			),

			Field::make(
				'text',
				'employee_phone',
				'Телефон'
			),

			Field::make(
				'text',
				'employee_email',
				'E-mail'
			),

			Field::make(
				'rich_text',
				'employee_bio',
				'Биография'
			)

		]);
	}
);
