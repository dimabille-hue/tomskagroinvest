<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

while (have_posts()) :

	the_post();

	$municipality = carbon_get_post_meta(
		get_the_ID(),
		'project_municipality'
	);

	$investment = carbon_get_post_meta(
		get_the_ID(),
		'project_cost'
	);

	$jobs = carbon_get_post_meta(
		get_the_ID(),
		'project_jobs'
	);

	$investor = carbon_get_post_meta(
		get_the_ID(),
		'project_investor'
	);

	$industry = carbon_get_post_meta(
		get_the_ID(),
		'project_industry'
	);

	$implementation = carbon_get_post_meta(
		get_the_ID(),
		'project_implementation_period'
	);

	$passport = carbon_get_post_meta(
		get_the_ID(),
		'project_passport'
	);

	$status = get_the_terms(
		get_the_ID(),
		'project_status'
	);

?>

<section class="project-single-hero">

	<div class="container">

		<div class="breadcrumbs">

			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb();
			}
			?>

		</div>

		<h1>

			<?php the_title(); ?>

		</h1>

		<?php if ($status && !is_wp_error($status)) : ?>

			<div class="project-single-status">

				<?php echo esc_html($status[0]->name); ?>

			</div>

		<?php endif; ?>

	</div>

</section>

<section class="project-single">

	<div class="container">

		<div class="project-layout">

			<div class="project-main">

				<?php if (has_post_thumbnail()) : ?>

					<div class="project-cover">

						<?php the_post_thumbnail('full'); ?>

					</div>

				<?php endif; ?>

				<div class="project-content">

					<?php the_content(); ?>

				</div>

			</div>

			<aside class="project-sidebar">

				<div class="project-info">

					<h3>

						Паспорт проекта

					</h3>

					<?php if ($municipality) : ?>

						<div class="info-row">

							<strong>Муниципалитет</strong>

							<span>

								<?php echo esc_html($municipality); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($industry) : ?>

						<div class="info-row">

							<strong>Отрасль</strong>

							<span>

								<?php echo esc_html($industry); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($investment) : ?>

						<div class="info-row">

							<strong>Инвестиции</strong>

							<span>

								<?php echo esc_html($investment); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($jobs) : ?>

						<div class="info-row">

							<strong>Рабочие места</strong>

							<span>

								<?php echo esc_html($jobs); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($investor) : ?>

						<div class="info-row">

							<strong>Инвестор</strong>

							<span>

								<?php echo esc_html($investor); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($implementation) : ?>

						<div class="info-row">

							<strong>Срок реализации</strong>

							<span>

								<?php echo esc_html($implementation); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($passport) : ?>

						<div class="project-download">

							<a
								href="<?php echo esc_url(wp_get_attachment_url($passport)); ?>"
								target="_blank"
								class="btn btn-primary"
							>

								Скачать паспорт проекта

							</a>

						</div>

					<?php endif; ?>

				</div>

			</aside>

		</div>

	</div>

</section>

<?php

endwhile;

get_footer();