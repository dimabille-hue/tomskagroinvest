<?php

if (!defined('ABSPATH')) {
	exit;
}

$documents_query = new WP_Query([
	'post_type' => 'documents',
	'posts_per_page' => 4,
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
]);

if (!$documents_query->have_posts()) {
	return;
}

?>

<section class="documents-grid home-section">
	<div class="container">
		<div class="section-heading">
			<h2>Документы</h2>
			<a class="section-link" href="<?php echo esc_url(home_url('/documents/')); ?>">Все документы</a>
		</div>
		<div class="documents-grid__items">
			<?php while ($documents_query->have_posts()) : $documents_query->the_post(); ?>
				<?php get_template_part('template-parts/documents/card'); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php
wp_reset_postdata();
