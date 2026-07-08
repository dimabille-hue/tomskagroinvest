<?php

if (!defined('ABSPATH')) {
	exit;
}

function tai_pagination($query = null)
{
	if (!$query) {

		global $wp_query;

		$query = $wp_query;
	}

	if ($query->max_num_pages <= 1) {

		return;
	}

	echo '<nav class="pagination">';

	echo paginate_links([

		'total' => $query->max_num_pages,

		'current' => max(
			1,
			get_query_var('paged')
		),

		'mid_size' => 2,

		'end_size' => 1,

		'prev_text' => '←',

		'next_text' => '→'

	]);

	echo '</nav>';
}