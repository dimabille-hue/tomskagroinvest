<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

while (have_posts()) :

	the_post();

	$banner = carbon_get_post_meta(
		get_the_ID(),
		'activity_banner'
	);

?>

<section class="activity-hero">

	<?php if ($banner) : ?>

		<div class="activity-banner">

			<?php

			echo wp_get_attachment_image(

				$banner,

				'full'

			);

			?>

		</div>

	<?php endif; ?>

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

	</div>

</section>

<section class="activity-content">

	<div class="container">

		<div class="content-wrapper">

			<div class="content-main">

				<?php the_content(); ?>

			</div>

			<aside class="content-sidebar">

				<div class="sidebar-card">

					<h3>

						Полезные разделы

					</h3>

					<ul>

						<li>

							<a href="/documents/">

								Документы

							</a>

						</li>

						<li>

							<a href="/projects/">

								Инвестиционные проекты

							</a>

						</li>

						<li>

							<a href="/contacts/">

								Контакты

							</a>

						</li>

					</ul>

				</div>

			</aside>

		</div>

	</div>

</section>

<?php

$documents = new WP_Query([

	'post_type'=>'documents',

	'posts_per_page'=>5,

	'orderby'=>'date',

	'order'=>'DESC'

]);

if ($documents->have_posts()) :

?>

<section class="activity-documents">

	<div class="container">

		<h2>

			Документы по направлению

		</h2>

		<div class="documents-list">

			<?php

			while ($documents->have_posts()) :

				$documents->the_post();

			?>

			<a

				class="document-link"

				href="<?php the_permalink(); ?>"

			>

				<?php the_title(); ?>

			</a>

			<?php

			endwhile;

			wp_reset_postdata();

			?>

		</div>

	</div>

</section>

<?php

endif;

$projects = new WP_Query([

	'post_type'=>'projects',

	'posts_per_page'=>3,

	'orderby'=>'menu_order',

	'order'=>'ASC'

]);

if ($projects->have_posts()) :

?>

<section class="activity-projects">

	<div class="container">

		<h2>

			Связанные инвестиционные проекты

		</h2>

		<div class="projects-grid">

			<?php

			while ($projects->have_posts()) :

				$projects->the_post();

				get_template_part(

					'template-parts/projects/card'

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