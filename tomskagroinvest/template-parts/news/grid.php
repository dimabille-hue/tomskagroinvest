<?php

if (!defined('ABSPATH')) {
	exit;
}

$news_query = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 4,
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
]);

if (!$news_query->have_posts()) {
	return;
}

$news_page_id = get_option('page_for_posts');
$news_url = $news_page_id ? get_permalink($news_page_id) : home_url('/news/');

?>

<section class="news-grid home-section" id="news">
	<div class="container">
		<div class="section-heading">
			<h2>Новости</h2>
			<a class="section-link" href="<?php echo esc_url($news_url); ?>">Все новости</a>
		</div>
		<div class="news-grid__items">
			<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
				<?php get_template_part('template-parts/news/card'); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php
wp_reset_postdata();
