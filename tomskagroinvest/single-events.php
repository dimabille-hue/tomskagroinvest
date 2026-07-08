<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

while (have_posts()) :

	the_post();

	$date = carbon_get_post_meta(
		get_the_ID(),
		'event_date'
	);

	$source = carbon_get_post_meta(
		get_the_ID(),
		'event_source'
	);

	$location = carbon_get_post_meta(
		get_the_ID(),
		'event_location'
	);

	$gallery = carbon_get_post_meta(
		get_the_ID(),
		'event_gallery'
	);

?>

<section class="event-hero">

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

		<div class="event-meta">

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

			<?php if ($location) : ?>

				<span>

					📍

					<?php

					echo esc_html($location);

					?>

				</span>

			<?php endif; ?>

		</div>

	</div>

</section>

<section class="event-single">

	<div class="container">

		<?php if (has_post_thumbnail()) : ?>

			<div class="event-cover">

				<?php the_post_thumbnail('full'); ?>

			</div>

		<?php endif; ?>

		<div class="event-content">

			<?php the_content(); ?>

		</div>

		<?php

		if ($gallery) :

		?>

		<div class="event-gallery swiper">

			<div class="swiper-wrapper">

				<?php

				foreach ($gallery as $item) :

				?>

					<div class="swiper-slide">

						<?php

						echo wp_get_attachment_image(

							$item['image'],

							'large'

						);

						?>

					</div>

				<?php

				endforeach;

				?>

			</div>

		</div>

		<?php endif; ?>

	</div>

</section>

<?php

$related = new WP_Query([

	'post_type'=>'events',

	'posts_per_page'=>3,

	'post__not_in'=>[get_the_ID()],

	'orderby'=>'date'

]);

if ($related->have_posts()) :

?>

<section class="related-news">

	<div class="container">

		<h2>

			Другие новости

		</h2>

		<div class="news-grid">

			<?php

			while ($related->have_posts()) :

				$related->the_post();

				get_template_part(

					'template-parts/news/card'

				);

			endwhile;

			wp_reset_postdata();

			?>

		</div>

	</div>

</section>

<?php

endif;

endwhile;

get_footer();