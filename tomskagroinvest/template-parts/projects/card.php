<?php

if (!defined('ABSPATH')) {
	exit;
}

$status = carbon_get_post_meta(
	get_the_ID(),
	'project_status'
);

$region = carbon_get_post_meta(
	get_the_ID(),
	'project_region'
);

?>

<article <?php post_class('project-card'); ?>>

	<a
		class="project-card__image"
		href="<?php the_permalink(); ?>"
	>

		<?php tai_thumbnail('project-card'); ?>

	</a>

	<div class="project-card__body">

		<?php if ($status) : ?>

			<div class="project-card__status">

				<?php echo esc_html($status); ?>

			</div>

		<?php endif; ?>

		<h3>

			<a href="<?php the_permalink(); ?>">

				<?php the_title(); ?>

			</a>

		</h3>

		<?php if ($region) : ?>

			<div class="project-card__region">

				<?php echo esc_html($region); ?>

			</div>

		<?php endif; ?>

		<div class="project-card__excerpt">

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