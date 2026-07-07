<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
	'carbon_fields_register_fields',
	function () {

		Container::make(
			'post_meta',
			'Информация о партнёре'
		)

		->where(
			'post_type',
			'=',
			'partners'
		)

		->add_fields([

			Field::make(
				'text',
				'partner_url',
				'Сайт организации'
			)

		]);

	}
);