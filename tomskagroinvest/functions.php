<?php

if (!defined('ABSPATH')) {
	exit;
}

define('TAI_THEME_VERSION', '1.0.0');
define('TAI_THEME_PATH', get_template_directory());
define('TAI_THEME_URI', get_template_directory_uri());

$includes = [

	'/inc/setup.php',

	'/inc/enqueue.php',

	'/inc/cleanup.php',

	'/inc/images.php',

	'/inc/helpers.php',

	'/inc/breadcrumbs.php',

	'/inc/pagination.php',

	'/inc/search.php',

	'/inc/sitemap.php',

	'/inc/security.php',

	'/inc/svg.php',

	'/inc/widgets.php',

	'/inc/init.php'

];

foreach ($includes as $file) {

	$path = TAI_THEME_PATH . $file;

	if (file_exists($path)) {

		require_once $path;

	}

}