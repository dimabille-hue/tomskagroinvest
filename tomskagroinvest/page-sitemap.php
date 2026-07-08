<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

?>

<section class="page-content">

	<div class="container">

		<header class="page-header">

			<h1>

				Карта сайта

			</h1>

			<p>

				Все основные разделы и материалы сайта.

			</p>

		</header>

		<div class="sitemap">

			<section class="sitemap-section">

				<h2>

					Основные страницы

				</h2>

				<ul>

					<?php

					wp_list_pages([
						'title_li' => '',
						'sort_column' => 'menu_order'
					]);

					?>

				</ul>

			</section>

			<section class="sitemap-section">

				<h2>

					Направления деятельности

				</h2>

				<ul>

					<?php

					$activities = get_posts([
						'post_type' => 'activities',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC'
					]);

					foreach ($activities as $post) :

						setup_postdata($post);

					?>

						<li>

							<a href="<?php the_permalink(); ?>">

								<?php the_title(); ?>

							</a>

						</li>

					<?php

					endforeach;

					wp_reset_postdata();

					?>

				</ul>

			</section>

			<section class="sitemap-section">

				<h2>

					Инвестиционные проекты

				</h2>

				<ul>

					<?php

					$projects = get_posts([
						'post_type' => 'projects',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC'
					]);

					foreach ($projects as $post) :

						setup_postdata($post);

					?>

						<li>

							<a href="<?php the_permalink(); ?>">

								<?php the_title(); ?>

							</a>

						</li>

					<?php

					endforeach;

					wp_reset_postdata();

					?>

				</ul>

			</section>

			<section class="sitemap-section">

				<h2>

					Документы

				</h2>

				<ul>

					<?php

					$documents = get_posts([
						'post_type' => 'documents',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'date',
						'order' => 'DESC'
					]);

					foreach ($documents as $post) :

						setup_postdata($post);

					?>

						<li>

							<a href="<?php the_permalink(); ?>">

								<?php the_title(); ?>

							</a>

						</li>

					<?php

					endforeach;

					wp_reset_postdata();

					?>

				</ul>

			</section>

			<section class="sitemap-section">

				<h2>

					Новости

				</h2>

				<ul>

					<?php

					$events = get_posts([
						'post_type' => 'events',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'date',
						'order' => 'DESC'
					]);

					foreach ($events as $post) :

						setup_postdata($post);

					?>

						<li>

							<a href="<?php the_permalink(); ?>">

								<?php the_title(); ?>

							</a>

						</li>

					<?php

					endforeach;

					wp_reset_postdata();

					?>

				</ul>

			</section>

		</div>

	</div>

</section>

<?php

get_footer();