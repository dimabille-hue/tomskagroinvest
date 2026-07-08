<?php

if (!defined('ABSPATH')) {
	exit;
}

$theme_files = [
	'/inc/cpt/projects.php',
	'/inc/cpt/documents.php',
	'/inc/cpt/events.php',
	'/inc/cpt/activities.php',
	'/inc/cpt/partners.php',
	'/inc/cpt/employees.php',
	'/inc/cpt/buildings.php',
	'/inc/cpt/premises.php',
	'/inc/carbon-fields/carbon-fields.php',
];

foreach ($theme_files as $theme_file) {
	$theme_file_path = TAI_THEME_PATH . $theme_file;

	if (file_exists($theme_file_path)) {
		require_once $theme_file_path;
	}
}
