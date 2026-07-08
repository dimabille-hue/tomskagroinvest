<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action(

	'wp_enqueue_scripts',

	function () {

		wp_enqueue_style(

			'tai-main',

			TAI_THEME_URI .

			'/assets/css/main.css',

			[],

			TAI_THEME_VERSION

		);

		foreach (glob(TAI_THEME_PATH . '/assets/css/components/*.css') as $component_css) {

			$handle = 'tai-' . basename($component_css, '.css');

			wp_enqueue_style(

				$handle,

				TAI_THEME_URI . '/assets/css/components/' . basename($component_css),

				['tai-main'],

				TAI_THEME_VERSION

			);

		}

		wp_enqueue_style(

			'tai-accessibility',

			TAI_THEME_URI .

			'/assets/css/accessibility.css',

			[],

			TAI_THEME_VERSION

		);

		wp_enqueue_style(

			'tai-home-design',

			TAI_THEME_URI . '/assets/css/home-design.css',

			['tai-main'],

			TAI_THEME_VERSION

		);

		wp_enqueue_style(

			'swiper',

			'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'

		);

		wp_enqueue_script(

			'swiper',

			'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',

			[],

			null,

			true

		);

		wp_enqueue_script(

			'tai-slider',

			TAI_THEME_URI .

			'/assets/js/slider.js',

			['swiper'],

			TAI_THEME_VERSION,

			true

		);

		wp_enqueue_script(

			'tai-search',

			TAI_THEME_URI .

			'/assets/js/search.js',

			[],

			TAI_THEME_VERSION,

			true

		);

		wp_enqueue_script(

			'tai-mobile-menu',

			TAI_THEME_URI .

			'/assets/js/mobile-menu.js',

			[],

			TAI_THEME_VERSION,

			true

		);

		wp_enqueue_script(

			'tai-accessibility',

			TAI_THEME_URI .

			'/assets/js/accessibility.js',

			[],

			TAI_THEME_VERSION,

			true

		);

		wp_localize_script(

			'tai-search',

			'tai_ajax',

			[

				'ajax_url' => admin_url(

					'admin-ajax.php'

				)

			]

		);

	}

);
