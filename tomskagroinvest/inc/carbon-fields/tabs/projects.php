<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Field;

$theme_options->add_tab(
	'Проекты',
	[
		Field::make('separator', 'projects_home_separator', 'Блок проектов на главной'),
		Field::make('text', 'projects_home_title', 'Заголовок')->set_default_value('Инвестиционные проекты'),
		Field::make('textarea', 'projects_home_text', 'Описание'),
	]
);
