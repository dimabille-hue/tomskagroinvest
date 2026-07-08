<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$paged = max(
	1,
	get_query_var('paged')
);

$query = new WP_Query([
	'post_type'      => 'events',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $paged,
	'orderby'        => 'date',
	'order'          => 'DESC'
]);

?>

<section class="archive-hero">

	<div class="container">

		<h1>

			Новости

		</h1>

		<p>

			Новости, мероприятия, пресс-релизы и события Агентства инвестиционного развития.

		</p>

	</div>

</section>

<section class="news-page">

	<div class="container">

		<div class="news-grid">

			<?php

			if ($query->have_posts()) :

				while ($query->have_posts()) :

					$query->the_post();

					$date = carbon_get_post_meta(
						get_the_ID(),
						'event_date'
					);

					$source = carbon_get_post_meta(
						get_the_ID(),
						'event_source'
					);

			?>

			<article class="news-card">

				<a href="<?php the_permalink(); ?>">

					<div class="news-image">

						<?php

						if (has_post_thumbnail()) {

							the_post_thumbnail('large');

						}

						?>

					</div>

					<div class="news-content">

						<div class="news-meta">

							<span>

								📅

								<?php

								echo esc_html(

									$date ?: get_the_date()

								);

								?>

							</span>

							<?php if ($source) : ?>

								<span>

									<?php

									echo esc_html($source);

									?>

								</span>

							<?php endif; ?>

						</div>

						<h2>

							<?php the_title(); ?>

						</h2>

						<div class="news-excerpt">

							<?php

							echo wp_trim_words(

								get_the_excerpt(),

								28

							);

							?>

						</div>

						<div class="news-more">

							Читать полностью →

						</div>

					</div>

				</a>

			</article>

			<?php

				endwhile;

			endif;

			wp_reset_postdata();

			?>

		</div>

		<div class="pagination">

			<?php

			echo paginate_links([

				'total'=>$query->max_num_pages,

				'current'=>$paged,

				'mid_size'=>2,

				'prev_text'=>'←',

				'next_text'=>'→'

			]);

			?>

		</div>

	</div>

</section>

<?php

get_footer();