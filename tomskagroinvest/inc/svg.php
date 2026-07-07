<?php

if (!defined('ABSPATH')) {
	exit;
}

function tai_svg($name)
{
	$file = TAI_THEME_PATH .
		'/assets/images/icons/' .
		$name .
		'.svg';

	if (file_exists($file)) {

		include $file;
	}
}