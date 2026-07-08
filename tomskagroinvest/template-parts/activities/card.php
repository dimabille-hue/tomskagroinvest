<?php

if (!defined('ABSPATH')) {
	exit;
}

?>

<article <?php post_class('activity-card'); ?>>

	<a
		class="activity-card__image"
		href="<?php the_permalink(); ?>"
	>

		<?php tai_thumbnail('activity-card'); ?>

	</a>

	<div class="activity-card__body">

		<h3>

			<a href="<?php the_permalink(); ?>">

				<?php the_title(); ?>

			</a>

		</h3>

		<div class="activity-card__excerpt">

			<?php the_excerpt(); ?>

		</div>

		<a
			class="btn btn-outline"
			href="<?php the_permalink(); ?>"
		>

			Подробнее

		</a>

	</div>

</article>