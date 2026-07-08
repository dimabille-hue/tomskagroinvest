<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Field;

$theme_options->add_tab(
	'Направления',
	[
		Field::make('separator', 'activities_home_separator', 'Блок направлений на главной'),
		Field::make('text', 'activities_home_title', 'Заголовок')->set_default_value('Направления деятельности'),
		Field::make('textarea', 'activities_home_text', 'Описание'),
	]
);
