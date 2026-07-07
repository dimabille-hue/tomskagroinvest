<?php

if (!defined('ABSPATH')) {
	exit;
}

$title = carbon_get_theme_option('company_title');
$subtitle = carbon_get_theme_option('company_subtitle');

$mission = carbon_get_theme_option('company_mission');

$history = carbon_get_theme_option('company_history');

$image = carbon_get_theme_option('company_image');

$button_text = carbon_get_theme_option('company_button_text');

$button_url = carbon_get_theme_option('company_button_url');

?>

<section class="company">

	<div class="container">

		<div class="company-grid">

			<div class="company-content">

				<?php if ($subtitle) : ?>

					<div class="section-subtitle">

						<?php echo esc_html($subtitle); ?>

					</div>

				<?php endif; ?>

				<?php if ($title) : ?>

					<h2 class="section-title">

						<?php echo esc_html($title); ?>

					</h2>

				<?php endif; ?>

				<?php if ($mission) : ?>

					<div class="company-mission">

						<?php echo apply_filters(
							'the_content',
							$mission
						); ?>

					</div>

				<?php endif; ?>

				<?php if ($history) : ?>

					<div class="company-history">

						<?php echo apply_filters(
							'the_content',
							$history
						); ?>

					</div>

				<?php endif; ?>

				<?php if ($button_text && $button_url) : ?>

					<a
						class="btn btn-primary"
						href="<?php echo esc_url($button_url); ?>"
					>

						<?php echo esc_html($button_text); ?>

					</a>

				<?php endif; ?>

			</div>

			<div class="company-image">

				<?php

				if ($image) {

					echo wp_get_attachment_image(
						$image,
						'large'
					);

				}

				?>

			</div>

		</div>

	</div>

</section>