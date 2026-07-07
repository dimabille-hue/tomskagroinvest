<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$latest = new WP_Query([
	'post_type' => 'events',
	'posts_per_page' => 3,
	'post_status' => 'publish'
]);

?>

<section class="error404-page">

	<div class="container">

		<div class="error404-number">

			404

		</div>

		<h1>

			Страница не найдена

		</h1>

		<p>

			Возможно, страница была удалена, перемещена или адрес указан неверно.

		</p>

		<form
			class="search-form-page"
			action="<?php echo esc_url(home_url('/')); ?>"
			method="get"
		>

			<input
				type="search"
				name="s"
				placeholder="Поиск по сайту..."
			>

			<button
				class="btn btn-primary"
				type="submit"
			>

				Поиск

			</button>

		</form>

		<div class="error-links">

			<a href="/">Главная</a>

			<a href="/projects/">Проекты</a>

			<a href="/documents/">Документы</a>

			<a href="/activities/">Направления деятельности</a>

			<a href="/events/">Новости</a>

			<a href="/contacts/">Контакты</a>

		</div>

	</div>

</section>

<?php

if ($latest->have_posts()) :

?>

<section class="latest-news-404">

	<div class="container">

		<h2>

			Последние новости

		</h2>

		<div class="news-grid">

			<?php

			while ($latest->have_posts()) :

				$latest->the_post();

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

get_footer();