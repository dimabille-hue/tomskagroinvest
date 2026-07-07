<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

global $wp_query;

?>

<section class="archive-hero">

	<div class="container">

		<h1>

			Поиск по сайту

		</h1>

		<p>

			Результаты поиска по запросу:
			<strong>
				<?php echo esc_html(get_search_query()); ?>
			</strong>

		</p>

	</div>

</section>

<section class="search-page">

	<div class="container">

		<form
			class="search-form-page"
			method="get"
			action="<?php echo esc_url(home_url('/')); ?>"
		>

			<input
				type="search"
				name="s"
				value="<?php echo esc_attr(get_search_query()); ?>"
				placeholder="Введите поисковый запрос..."
			>

			<button
				type="submit"
				class="btn btn-primary"
			>

				Поиск

			</button>

		</form>

		<?php if ($wp_query->have_posts()) : ?>

			<div class="search-results">

				<?php

				while ($wp_query->have_posts()) :

					$wp_query->the_post();

					$type = get_post_type();

					switch ($type) {

						case 'documents':
							$type_name = 'Документ';
							break;

						case 'projects':
							$type_name = 'Проект';
							break;

						case 'activities':
							$type_name = 'Направление деятельности';
							break;

						case 'events':
							$type_name = 'Новость';
							break;

						case 'page':
							$type_name = 'Страница';
							break;

						default:
							$type_name = 'Материал';

					}

				?>

				<article class="search-item">

					<div class="search-type">

						<?php echo esc_html($type_name); ?>

					</div>

					<h2>

						<a href="<?php the_permalink(); ?>">

							<?php the_title(); ?>

						</a>

					</h2>

					<div class="search-meta">

						<?php echo get_the_date(); ?>

					</div>

					<div class="search-excerpt">

						<?php

						echo wp_trim_words(

							wp_strip_all_tags(get_the_excerpt()),

							35

						);

						?>

					</div>

				</article>

				<?php endwhile; ?>

			</div>

			<div class="pagination">

				<?php

				echo paginate_links([

					'total'=>$wp_query->max_num_pages,

					'current'=>max(1,get_query_var('paged')),

					'mid_size'=>2,

					'prev_text'=>'←',

					'next_text'=>'→'

				]);

				?>

			</div>

		<?php else : ?>

			<div class="search-empty">

				<h2>

					Ничего не найдено

				</h2>

				<p>

					Попробуйте изменить поисковый запрос.

				</p>

			</div>

		<?php endif; ?>

	</div>

</section>

<?php

wp_reset_postdata();

get_footer();