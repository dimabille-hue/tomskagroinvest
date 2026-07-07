<?php

if (!defined('ABSPATH')) {
	exit;
}

?>

<article <?php post_class('news-card'); ?>>

	<a
		class="news-card__image"
		href="<?php the_permalink(); ?>"
	>

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

			<?php the_excerpt(); ?>

		</div>

	</div>

</article>