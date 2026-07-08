<?php

if (!defined('ABSPATH')) {
	exit;
}

$file = carbon_get_post_meta(
	get_the_ID(),
	'document_file'
);

?>

<article <?php post_class('document-card'); ?>>

	<h3>

		<a href="<?php the_permalink(); ?>">

			<?php the_title(); ?>

		</a>

	</h3>

	<div class="document-card__excerpt">

		<?php the_excerpt(); ?>

	</div>

	<?php if ($file) : ?>

		<div class="document-card__meta">

			<span>

				<?php echo esc_html(tai_file_size($file)); ?>

			</span>

		</div>

		<a

			class="btn btn-primary"

			href="<?php echo esc_url(tai_file_url($file)); ?>"

			target="_blank"

			rel="noopener"

		>

			Скачать

		</a>

	<?php endif; ?>

</article>