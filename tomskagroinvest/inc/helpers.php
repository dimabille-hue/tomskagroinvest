<?php

if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('carbon_get_theme_option')) {
	function carbon_get_theme_option($name)
	{
		return '';
	}
}

if (!function_exists('carbon_get_post_meta')) {
	function carbon_get_post_meta($post_id, $name)
	{
		return '';
	}
}

/*
|--------------------------------------------------------------------------
| Логотип сайта
|--------------------------------------------------------------------------
*/

function tai_logo()
{
	$logo = tai_option('header_logo');

	if ($logo) {

		echo wp_get_attachment_image(
			$logo,
			'full'
		);

		return;
	}

	the_custom_logo();
}

/*
|--------------------------------------------------------------------------
| Телефон
|--------------------------------------------------------------------------
*/

function tai_phone()
{
	return tai_option('tai_phone');
}

function tai_phone_href()
{
	return preg_replace(
		'/[^0-9+]/',
		'',
		tai_phone()
	);
}

/*
|--------------------------------------------------------------------------
| Email
|--------------------------------------------------------------------------
*/

function tai_email()
{
	return tai_option('tai_email');
}

/*
|--------------------------------------------------------------------------
| Адрес
|--------------------------------------------------------------------------
*/

function tai_address()
{
	return tai_option('tai_address');
}

/*
|--------------------------------------------------------------------------
| Режим работы
|--------------------------------------------------------------------------
*/

function tai_worktime()
{
	return tai_option('tai_worktime');
}

/*
|--------------------------------------------------------------------------
| Изображение записи
|--------------------------------------------------------------------------
*/

function tai_thumbnail($size = 'large')
{
	if (has_post_thumbnail()) {

		the_post_thumbnail($size);

		return;
	}

	printf(
		'<img src="%s/assets/images/no-image.svg" alt="%s">',
		esc_url(TAI_THEME_URI),
		esc_attr(get_the_title())
	);
}

/*
|--------------------------------------------------------------------------
| URL вложения
|--------------------------------------------------------------------------
*/

function tai_file_url($id)
{
	if (!$id) {
		return '';
	}

	return wp_get_attachment_url($id);
}

/*
|--------------------------------------------------------------------------
| Размер файла
|--------------------------------------------------------------------------
*/

function tai_file_size($id)
{
	if (!$id) {
		return '';
	}

	$file = get_attached_file($id);

	if (!$file || !file_exists($file)) {
		return '';
	}

	return size_format(
		filesize($file),
		2
	);
}

/*
|--------------------------------------------------------------------------
| Дата
|--------------------------------------------------------------------------
*/

function tai_date($format = '')
{
	return get_the_date(
		$format ?: get_option('date_format')
	);
}

/*
|--------------------------------------------------------------------------
| Получение изображения Carbon Fields
|--------------------------------------------------------------------------
*/

function tai_image($id, $size = 'large')
{
	if (!$id) {
		return '';
	}

	return wp_get_attachment_image(
		$id,
		$size
	);
}

/*
|--------------------------------------------------------------------------
| Получение значения Carbon Theme Option
|--------------------------------------------------------------------------
*/

function tai_option($key, $default = '')
{
	if (!function_exists('carbon_get_theme_option')) {
		return $default;
	}

	$value = carbon_get_theme_option($key);

	return $value !== '' ? $value : $default;
}

function tai_post_meta($post_id, $key, $default = '')
{
	if (!function_exists('carbon_get_post_meta')) {
		return $default;
	}

	$value = carbon_get_post_meta($post_id, $key);

	return $value !== '' ? $value : $default;
}

function tai_primary_menu_fallback($args = [])
{
	$company_page = get_page_by_path('company');
	$contacts_page = get_page_by_path('contacts');
	$news_page = get_option('page_for_posts');

	$items = [
		$company_page ? get_permalink($company_page) : home_url('/#company') => 'О компании',
		get_post_type_archive_link('activities') ?: home_url('/#activities') => 'Направления деятельности',
		$news_page ? get_permalink($news_page) : home_url('/news/') => 'Новости',
		get_post_type_archive_link('documents') ?: home_url('/#documents') => 'Документы',
		$contacts_page ? get_permalink($contacts_page) : home_url('/#contacts') => 'Контакты',
	];

	$menu_class = $args['menu_class'] ?? 'main-menu';

	echo '<ul class="' . esc_attr($menu_class) . '">';

	foreach ($items as $url => $label) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url($url),
			esc_html($label)
		);
	}

	echo '</ul>';
}
