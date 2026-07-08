<?php
/**
 * Template Name: Арендаторам
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$selected_building = isset($_GET['building']) ? absint($_GET['building']) : 0;
$area_from = isset($_GET['area_from']) ? (float) str_replace(',', '.', sanitize_text_field(wp_unslash($_GET['area_from']))) : 0;
$area_to = isset($_GET['area_to']) ? (float) str_replace(',', '.', sanitize_text_field(wp_unslash($_GET['area_to']))) : 0;
$price_to = isset($_GET['price_to']) ? (float) str_replace(',', '.', sanitize_text_field(wp_unslash($_GET['price_to']))) : 0;

$buildings = get_posts([
	'post_type' => 'buildings',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'menu_order title',
	'order' => 'ASC',
]);

?>

<section class="tenants-page">
	<div class="container">
		<header class="page-header tenants-page__header">
			<h1><?php the_title(); ?></h1>
			<p>Информация о свободных помещениях в строениях: фото, площадь, стоимость и формы документов.</p>
		</header>

		<form class="tenants-filter" method="get">
			<label>
				<span>Строение</span>
				<select name="building">
					<option value="0">Все строения</option>
					<?php foreach ($buildings as $building) : ?>
						<option value="<?php echo esc_attr($building->ID); ?>" <?php selected($selected_building, $building->ID); ?>>
							<?php echo esc_html(get_the_title($building)); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</label>

			<label>
				<span>Площадь от, м²</span>
				<input type="number" name="area_from" min="0" step="0.1" value="<?php echo esc_attr($area_from ?: ''); ?>">
			</label>

			<label>
				<span>Площадь до, м²</span>
				<input type="number" name="area_to" min="0" step="0.1" value="<?php echo esc_attr($area_to ?: ''); ?>">
			</label>

			<label>
				<span>Цена до</span>
				<input type="number" name="price_to" min="0" step="1" value="<?php echo esc_attr($price_to ?: ''); ?>">
			</label>

			<button class="btn btn-primary" type="submit">Найти</button>
			<a class="btn btn-outline" href="<?php echo esc_url(get_permalink()); ?>">Сбросить</a>
		</form>

		<div class="tenants-buildings">
			<?php if ($buildings) : ?>
				<?php foreach ($buildings as $building) : ?>
					<?php
					if ($selected_building && $selected_building !== $building->ID) {
						continue;
					}

					$meta_query = [
						'relation' => 'AND',
						[
							'key' => '_premise_building',
							'value' => (string) $building->ID,
							'compare' => '=',
						],
					];

					if ($area_from) {
						$meta_query[] = [
							'key' => '_premise_area',
							'value' => $area_from,
							'compare' => '>=',
							'type' => 'NUMERIC',
						];
					}

					if ($area_to) {
						$meta_query[] = [
							'key' => '_premise_area',
							'value' => $area_to,
							'compare' => '<=',
							'type' => 'NUMERIC',
						];
					}

					if ($price_to) {
						$meta_query[] = [
							'key' => '_premise_price',
							'value' => $price_to,
							'compare' => '<=',
							'type' => 'NUMERIC',
						];
					}

					$premises = new WP_Query([
						'post_type' => 'premises',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC',
						'meta_query' => $meta_query,
					]);
					?>

					<article class="tenants-building">
						<div class="tenants-building__summary">
							<div>
								<h2><?php echo esc_html(get_the_title($building)); ?></h2>
								<?php if (carbon_get_post_meta($building->ID, 'building_address')) : ?>
									<p><?php echo esc_html(carbon_get_post_meta($building->ID, 'building_address')); ?></p>
								<?php endif; ?>
							</div>
							<span><?php echo esc_html($premises->found_posts); ?> свободных помещений</span>
						</div>

						<?php if ($premises->have_posts()) : ?>
							<div class="premises-list">
								<?php while ($premises->have_posts()) : $premises->the_post(); ?>
									<?php
									$area = carbon_get_post_meta(get_the_ID(), 'premise_area');
									$price = carbon_get_post_meta(get_the_ID(), 'premise_price');
									$floor = carbon_get_post_meta(get_the_ID(), 'premise_floor');
									$number = carbon_get_post_meta(get_the_ID(), 'premise_number');
									$documents = carbon_get_post_meta(get_the_ID(), 'premise_documents');
									?>
									<article class="premise-card">
										<a class="premise-card__image" href="<?php the_permalink(); ?>">
											<?php tai_thumbnail('medium_large'); ?>
										</a>
										<div class="premise-card__body">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<ul class="premise-card__params">
												<?php if ($area) : ?><li><strong><?php echo esc_html($area); ?> м²</strong><span>площадь</span></li><?php endif; ?>
												<?php if ($price) : ?><li><strong><?php echo esc_html(number_format_i18n((float) $price)); ?> ₽/м²</strong><span>цена</span></li><?php endif; ?>
												<?php if ($floor) : ?><li><strong><?php echo esc_html($floor); ?></strong><span>этаж</span></li><?php endif; ?>
												<?php if ($number) : ?><li><strong><?php echo esc_html($number); ?></strong><span>номер</span></li><?php endif; ?>
											</ul>
											<div class="premise-card__excerpt"><?php the_excerpt(); ?></div>
											<?php if ($documents) : ?>
												<div class="premise-card__docs">
													<?php foreach ($documents as $document) : ?>
														<?php if (empty($document['file'])) { continue; } ?>
														<a href="<?php echo esc_url(wp_get_attachment_url($document['file'])); ?>" target="_blank" rel="noopener">
															<?php echo esc_html($document['title'] ?: 'Документ'); ?>
														</a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
										</div>
									</article>
								<?php endwhile; ?>
							</div>
						<?php else : ?>
							<p class="tenants-building__empty">По выбранным параметрам свободных помещений нет.</p>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
					</article>
				<?php endforeach; ?>
			<?php else : ?>
				<p class="tenants-building__empty">Строения пока не добавлены.</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
