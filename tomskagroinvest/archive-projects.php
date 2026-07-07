<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$paged = max(
	1,
	get_query_var('paged')
);

$args = [
	'post_type'      => 'projects',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $paged,
	'orderby'        => 'menu_order',
	'order'          => 'ASC'
];

$query = new WP_Query($args);

?>

<section class="archive-hero">

	<div class="container">

		<h1>

			<?php post_type_archive_title(); ?>

		</h1>

		<?php if (term_description()) : ?>

			<div class="archive-description">

				<?php echo term_description(); ?>

			</div>

		<?php endif; ?>

	</div>

</section>

<section class="projects-archive">

	<div class="container">

		<div class="projects-grid">

			<?php

			if ($query->have_posts()) :

				while ($query->have_posts()) :

					$query->the_post();

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

					$status = get_the_terms(
						get_the_ID(),
						'project_status'
					);

					?>

					<article class="project-card">

						<a href="<?php the_permalink(); ?>">

							<div class="project-image">

								<?php

								if (has_post_thumbnail()) {

									the_post_thumbnail('large');

								}

								?>

								<?php

								if (
									$status &&
									!is_wp_error($status)
								) :

									?>

									<div class="project-status">

										<?php

										echo esc_html(
											$status[0]->name
										);

										?>

									</div>

								<?php endif; ?>

							</div>

							<div class="project-body">

								<h3>

									<?php the_title(); ?>

								</h3>

								<?php if ($municipality) : ?>

									<div class="project-place">

										📍

										<?php

										echo esc_html(
											$municipality
										);

										?>

									</div>

								<?php endif; ?>

								<div class="project-excerpt">

									<?php

									echo wp_trim_words(

										get_the_excerpt(),

										25

									);

									?>

								</div>

								<div class="project-meta">

									<?php if ($investment) : ?>

										<div>

											<strong>

												Инвестиции

											</strong>

											<span>

												<?php

												echo esc_html(
													$investment
												);

												?>

											</span>

										</div>

									<?php endif; ?>

									<?php if ($jobs) : ?>

										<div>

											<strong>

												Рабочие места

											</strong>

											<span>

												<?php

												echo esc_html(
													$jobs
												);

												?>

											</span>

										</div>

									<?php endif; ?>

								</div>

							</div>

						</a>

					</article>

				<?php

				endwhile;

			else :

				?>

				<p>

					Проекты отсутствуют.

				</p>

			<?php

			endif;

			wp_reset_postdata();

			?>

		</div>

		<div class="pagination">

			<?php

			echo paginate_links([

				'total' => $query->max_num_pages,

				'current' => $paged,

				'mid_size' => 2,

				'prev_text' => '←',

				'next_text' => '→'

			]);

			?>

		</div>

	</div>

</section>

<?php

get_footer();