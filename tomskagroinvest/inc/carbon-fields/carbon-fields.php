<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Carbon_Fields;

if (!class_exists(Carbon_Fields::class)) {
	return;
}

add_action('after_setup_theme', [Carbon_Fields::class, 'boot']);

require_once __DIR__ . '/theme-options.php';

require_once __DIR__ . '/post-meta/projects.php';
require_once __DIR__ . '/post-meta/documents.php';
require_once __DIR__ . '/post-meta/events.php';
require_once __DIR__ . '/post-meta/activities.php';
require_once __DIR__ . '/post-meta/partners.php';
require_once __DIR__ . '/post-meta/employees.php';
