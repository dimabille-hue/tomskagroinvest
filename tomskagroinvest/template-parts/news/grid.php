<?php

if (!defined('ABSPATH')) {
	exit;
}

$news_query = new WP_Query([
	'post_type' => ['post', 'events'],
	'posts_per_page' => 4,
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
]);

$news_page_id = get_option('page_for_posts');
$news_url = $news_page_id ? get_permalink($news_page_id) : home_url('/news/');

?>

<section class="news-grid home-section" id="news">
	<div class="container">
		<div class="section-heading">
			<h2>Новости</h2>
			<a class="section-link" href="<?php echo esc_url($news_url); ?>">Все новости</a>
		</div>

		<?php if ($news_query->have_posts()) : ?>
			<div class="news-grid__items">
				<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
					<article <?php post_class('news-card'); ?>>
						<a class="news-card__image" href="<?php the_permalink(); ?>">
							<?php tai_thumbnail('news-card'); ?>
						</a>

						<div class="news-card__body">
							<div class="news-card__date">
								<?php echo esc_html(tai_date()); ?>
							</div>

							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>

							<div class="news-card__excerpt">
								<?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p class="news-grid__empty">Новости скоро появятся.</p>
		<?php endif; ?>
	</div>
</section>

<?php
wp_reset_postdata();
