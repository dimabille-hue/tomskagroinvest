<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$paged = max(1, get_query_var('paged'));

$category = isset($_GET['category'])
	? absint($_GET['category'])
	: 0;

$year = isset($_GET['year'])
	? absint($_GET['year'])
	: 0;

$args = [
	'post_type'      => 'documents',
	'post_status'    => 'publish',
	'posts_per_page' => 20,
	'paged'          => $paged,
	'orderby'        => 'date',
	'order'          => 'DESC'
];

if ($category) {

	$args['tax_query'] = [[

		'taxonomy' => 'document_category',

		'field' => 'term_id',

		'terms' => $category

	]];

}

if ($year) {

	$args['date_query'] = [[

		'year' => $year

	]];

}

$query = new WP_Query($args);

$categories = get_terms([
	'taxonomy' => 'document_category',
	'hide_empty' => false
]);

?>

<section class="archive-hero">

	<div class="container">

		<h1>

			Документы

		</h1>

		<p>

			Нормативные правовые акты, регламенты, методические материалы и иные документы учреждения.

		</p>

	</div>

</section>

<section class="documents-page">

	<div class="container">

		<form class="documents-filter" method="get">

			<div class="filter-grid">

				<input
					type="search"
					name="s"
					value="<?php echo esc_attr(get_search_query()); ?>"
					placeholder="Поиск документа..."
				>

				<select name="category">

					<option value="">

						Все категории

					</option>

					<?php foreach ($categories as $cat) : ?>

						<option

							value="<?php echo $cat->term_id; ?>"

							<?php selected(
								$category,
								$cat->term_id
							); ?>

						>

							<?php

							echo esc_html(
								$cat->name
							);

							?>

						</option>

					<?php endforeach; ?>

				</select>

				<select name="year">

					<option value="">

						Все годы

					</option>

					<?php

					for (

						$i = date('Y');

						$i >= 2015;

						$i--

					) :

					?>

						<option

							value="<?php echo $i; ?>"

							<?php selected(
								$year,
								$i
							); ?>

						>

							<?php echo $i; ?>

						</option>

					<?php endfor; ?>

				</select>

				<button
					type="submit"
					class="btn btn-primary"
				>

					Найти

				</button>

			</div>

		</form>

		<div class="documents-table">
<?php

while ($query->have_posts()) :

	$query->the_post();

	$file = carbon_get_post_meta(
		get_the_ID(),
		'document_file'
	);

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

	$url = '';

	$ext = '';

	if ($file) {

		$url = wp_get_attachment_url($file);

		$path = get_attached_file($file);

		if ($path) {

			$ext = strtoupper(
				pathinfo(
					$path,
					PATHINFO_EXTENSION
				)
			);

		}

	}

?>

<div class="document-row">

	<div class="document-format">

		<?php echo esc_html($ext ?: 'DOC'); ?>

	</div>

	<div class="document-title">

		<h3>

			<?php the_title(); ?>

		</h3>

		<div class="document-info">

			<?php if ($number) : ?>

				<span>

					№ <?php echo esc_html($number); ?>

				</span>

			<?php endif; ?>

			<?php if ($date) : ?>

				<span>

					<?php echo esc_html($date); ?>

				</span>

			<?php endif; ?>

			<?php if ($type) : ?>

				<span>

					<?php echo esc_html($type); ?>

				</span>

			<?php endif; ?>

		</div>

	</div>

	<div class="document-action">

		<?php if ($url) : ?>

			<a

				href="<?php echo esc_url($url); ?>"

				target="_blank"

				class="btn btn-primary"

			>

				Скачать

			</a>

		<?php endif; ?>

	</div>

</div>

<?php

endwhile;

wp_reset_postdata();

?>

</div>

<div class="pagination">

<?php

echo paginate_links([

	'total' => $query->max_num_pages,

	'current' => $paged,

	'mid_size' => 2,

	'prev_text' => '←',

	'next_text' => '→'

]);

?>

</div>

</div>

</section>

<?php

get_footer();