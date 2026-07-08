<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

while (have_posts()) :

	the_post();

	$number = carbon_get_post_meta(
		get_the_ID(),
		'document_number'
	);

	$date = carbon_get_post_meta(
		get_the_ID(),
		'document_date'
	);

	$type = carbon_get_post_meta(
		get_the_ID(),
		'document_type'
	);

	$author = carbon_get_post_meta(
		get_the_ID(),
		'document_author'
	);

	$status = carbon_get_post_meta(
		get_the_ID(),
		'document_status'
	);

	$effective = carbon_get_post_meta(
		get_the_ID(),
		'document_effective_date'
	);

	$invalid = carbon_get_post_meta(
		get_the_ID(),
		'document_invalid'
	);

	$file = carbon_get_post_meta(
		get_the_ID(),
		'document_file'
	);

	$external = carbon_get_post_meta(
		get_the_ID(),
		'document_external_url'
	);

?>

<section class="document-single">

	<div class="container">

		<div class="document-layout">

			<div class="document-content">

				<h1>

					<?php the_title(); ?>

				</h1>

				<div class="document-text">

					<?php the_content(); ?>

				</div>

			</div>

			<aside class="document-sidebar">

				<div class="document-card">

					<h3>

						Реквизиты документа

					</h3>

					<?php if ($number) : ?>

						<div class="info-row">

							<strong>Номер</strong>

							<span>

								<?php echo esc_html($number); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($date) : ?>

						<div class="info-row">

							<strong>Дата</strong>

							<span>

								<?php echo esc_html($date); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($type) : ?>

						<div class="info-row">

							<strong>Вид документа</strong>

							<span>

								<?php echo esc_html($type); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($author) : ?>

						<div class="info-row">

							<strong>Орган</strong>

							<span>

								<?php echo esc_html($author); ?>

							</span>

						</div>

					<?php endif; ?>

					<?php if ($effective) : ?>

						<div class="info-row">

							<strong>Вступил в силу</strong>

							<span>

								<?php echo esc_html($effective); ?>

							</span>

						</div>

					<?php endif; ?>

					<div class="info-row">

						<strong>Статус</strong>

						<span>

							<?php

							if ($invalid) {

								echo 'Утратил силу';

							} else {

								echo esc_html(
									$status ?: 'Действует'
								);

							}

							?>

						</span>

					</div>

					<?php if ($file) : ?>

						<div class="document-buttons">

							<a

								class="btn btn-primary"

								target="_blank"

								href="<?php echo esc_url(
									wp_get_attachment_url($file)
								); ?>"

							>

								Скачать документ

							</a>

						</div>

					<?php endif; ?>

					<?php if ($external) : ?>

						<div class="document-buttons">

							<a

								class="btn btn-secondary"

								target="_blank"

								href="<?php echo esc_url($external); ?>"

							>

								Официальный источник

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