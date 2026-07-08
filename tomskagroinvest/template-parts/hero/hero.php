<?php

if (!defined('ABSPATH')) {
	exit;
}

$slides = carbon_get_theme_option('hero_slides');

if (empty($slides)) {
	$slides = [
		[
			'image' => '',
			'title' => 'Развитие агропромышленной инфраструктуры Томской области',
			'text' => 'Создаем условия для устойчивого развития сельского хозяйства, торговли и обеспечения продовольственной безопасности региона.',
			'button_text' => 'Направления деятельности',
			'button_url' => home_url('/activities/'),
		],
	];
}

?>

<section class="hero">

	<div class="swiper hero-slider">

		<div class="swiper-wrapper">

			<?php foreach ($slides as $slide) :

				$image = $slide['image'] ?? '';
				$title = $slide['title'] ?? '';
				$text = $slide['text'] ?? '';
				$button = $slide['button_text'] ?? '';
				$url = $slide['button_url'] ?? '';

			?>

			<div class="swiper-slide hero-slide">

				<div class="hero-background">

					<?php

					if ($image) {

						echo wp_get_attachment_image(
							$image,
							'full',
							false,
							[
								'class' => 'hero-image'
							]
						);

					}

					?>

					<div class="hero-overlay"></div>

				</div>

				<div class="container">

					<div class="hero-content">

						<?php if ($title) : ?>

							<h1>

								<?php echo esc_html($title); ?>

							</h1>

						<?php endif; ?>

						<?php if ($text) : ?>

							<div class="hero-description">

								<?php echo wpautop($text); ?>

							</div>

						<?php endif; ?>

						<div class="hero-buttons">

							<?php if ($button && $url) : ?>

								<a
									href="<?php echo esc_url($url); ?>"
									class="btn btn-primary"
								>

									<?php echo esc_html($button); ?>

								</a>

							<?php endif; ?>

							<a
								href="<?php echo esc_url(home_url('/documents/')); ?>"
								class="btn btn-outline"
							>

								Документы

							</a>

						</div>

					</div>

				</div>

			</div>

			<?php endforeach; ?>

		</div>

		<div class="hero-pagination swiper-pagination"></div>

		<div class="hero-prev">

			<svg viewBox="0 0 24 24">

				<path d="M15 18L9 12L15 6"/>

			</svg>

		</div>

		<div class="hero-next">

			<svg viewBox="0 0 24 24">

				<path d="M9 18L15 12L9 6"/>

			</svg>

		</div>

	</div>

</section>
