<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
	'carbon_fields_register_fields',
	function () {

		Container::make(
			'post_meta',
			'Параметры документа'
		)

		->where(
			'post_type',
			'=',
			'documents'
		)

		->add_fields([

			Field::make(
				'text',
				'document_number',
				'Номер документа'
			),

			Field::make(
				'date',
				'document_date',
				'Дата документа'
			)
			->set_storage_format('Y-m-d')
			->set_input_format('d.m.Y'),

			Field::make(
				'text',
				'document_author',
				'Орган, принявший документ'
			),

			Field::make(
				'text',
				'document_type',
				'Вид документа'
			),

			Field::make(
				'text',
				'document_status',
				'Статус документа'
			),

			Field::make(
				'date',
				'document_effective_date',
				'Дата вступления в силу'
			)
			->set_storage_format('Y-m-d')
			->set_input_format('d.m.Y'),

			Field::make(
				'checkbox',
				'document_invalid',
				'Документ утратил силу'
			),

			Field::make(
				'file',
				'document_file',
				'Файл документа'
			)
			->set_value_type('id'),

			Field::make(
				'text',
				'document_external_url',
				'Ссылка на официальный источник'
			)

		]);

	}
);