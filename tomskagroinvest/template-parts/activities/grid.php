<?php

if (!defined('ABSPATH')) {
	exit;
}

$activities_query = new WP_Query([
	'post_type' => 'activities',
	'posts_per_page' => 5,
	'post_status' => 'publish',
	'orderby' => 'menu_order date',
	'order' => 'ASC',
]);

if (!$activities_query->have_posts()) {
	return;
}

?>

<section class="activities-grid home-section" id="activities">
	<div class="container">
		<div class="section-heading">
			<h2>Направления деятельности</h2>
			<a class="section-link" href="<?php echo esc_url(home_url('/activities/')); ?>">Смотреть все направления</a>
		</div>
		<div class="activities-grid__items">
			<?php while ($activities_query->have_posts()) : $activities_query->the_post(); ?>
				<?php get_template_part('template-parts/activities/card'); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php
wp_reset_postdata();
