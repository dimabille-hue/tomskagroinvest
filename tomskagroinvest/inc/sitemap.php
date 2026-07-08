<?php

if (!defined('ABSPATH')) {
	exit;
}

function tai_is_sitemap_request()
{
	$request_path = wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
	$home_path = wp_parse_url(home_url('/'), PHP_URL_PATH);

	$request_path = '/' . trim((string) $request_path, '/') . '/';
	$home_path = '/' . trim((string) $home_path, '/') . '/';

	if ($home_path !== '/' && str_starts_with($request_path, $home_path)) {
		$request_path = '/' . trim(substr($request_path, strlen($home_path)), '/') . '/';
	}

	return $request_path === '/sitemap/';
}

add_filter(
	'pre_handle_404',
	function ($preempt, $wp_query) {
		if (!tai_is_sitemap_request()) {
			return $preempt;
		}

		$wp_query->is_404 = false;
		$wp_query->is_page = true;

		return true;
	},
	10,
	2
);

add_filter(
	'template_include',
	function ($template) {
		if (!tai_is_sitemap_request()) {
			return $template;
		}

		$sitemap_template = TAI_THEME_PATH . '/page-sitemap.php';

		if (file_exists($sitemap_template)) {
			status_header(200);
			return $sitemap_template;
		}

		return $template;
	},
	99
);
