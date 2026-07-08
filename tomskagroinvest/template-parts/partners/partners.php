<?php

if (!defined('ABSPATH')) {
	exit;
}

$query = new WP_Query([
	'post_type'      => 'partners',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC'
]);

if (!$query->have_posts()) {
	return;
}

?>

<section class="partners">

	<div class="container">

		<div class="section-header">

			<div>

				<div class="section-subtitle">

					Сотрудничество

				</div>

				<h2 class="section-title">

					Наши партнёры

				</h2>

			</div>

		</div>

		<div class="swiper partners-slider">

			<div class="swiper-wrapper">

				<?php while ($query->have_posts()) :

					$query->the_post();

					$url = carbon_get_post_meta(
						get_the_ID(),
						'partner_url'
					);

					?>

					<div class="swiper-slide">

						<div class="partner-card">

							<?php if ($url) : ?>

								<a
									href="<?php echo esc_url($url); ?>"
									target="_blank"
									rel="noopener"
								>

							<?php endif; ?>

							<?php

							if (has_post_thumbnail()) {

								the_post_thumbnail(
									'medium'
								);

							}

							?>

							<?php if ($url) : ?>

								</a>

							<?php endif; ?>

						</div>

					</div>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div>

		</div>

	</div>

</section>