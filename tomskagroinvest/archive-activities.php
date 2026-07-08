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

	'post_type'      => 'activities',

	'post_status'    => 'publish',

	'posts_per_page' => 12,

	'paged'          => $paged,

	'orderby'        => 'menu_order',

	'order'          => 'ASC'

]);

?>

<section class="archive-hero">

	<div class="container">

		<h1>

			Направления деятельности

		</h1>

		<p>

			Основные направления деятельности Агентства инвестиционного развития.

		</p>

	</div>

</section>

<section class="activities-page">

	<div class="container">

		<div class="activities-grid">

			<?php

			while ($query->have_posts()) :

				$query->the_post();

				$icon = carbon_get_post_meta(
					get_the_ID(),
					'activity_icon'
				);

				$short = carbon_get_post_meta(
					get_the_ID(),
					'activity_short'
				);

			?>

			<article class="activity-card">

				<a href="<?php the_permalink(); ?>">

					<div class="activity-icon">

						<?php

						if ($icon) {

							echo wp_get_attachment_image(

								$icon,

								'medium'

							);

						}

						?>

					</div>

					<h2>

						<?php the_title(); ?>

					</h2>

					<div class="activity-text">

						<?php

						echo esc_html(

							$short ?: get_the_excerpt()

						);

						?>

					</div>

					<div class="activity-link">

						Подробнее →

					</div>

				</a>

			</article>

			<?php

			endwhile;

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