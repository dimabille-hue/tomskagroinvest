<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action(
	'pre_get_posts',
	function ($query) {

		if (
			is_admin() ||
			!$query->is_main_query()
		) {
			return;
		}

		if ($query->is_search()) {

			$query->set(
				'post_type',
				[
					'post',
					'page',
					'documents',
					'projects',
					'activities',
					'events'
				]
			);

			$query->set(
				'post_status',
				'publish'
			);
		}
	}
);