<?php
if (!defined('ABSPATH')) {
	exit;
}

$map = tai_option('contacts_map_embed');
?>
<section class="contacts-map home-section" id="contacts">
	<div class="container contacts-map__grid">
		<div class="contacts-map__info">
			<h2>Контакты</h2>
			<p><?php echo esc_html(tai_address() ?: 'г. Томск, пр. Фрунзе, 119е'); ?></p>
			<p><?php echo esc_html(tai_phone() ?: '8 (3822) 44-54-10'); ?></p>
			<p><?php echo esc_html(tai_email() ?: 'info@tomskagroinvest.ru'); ?></p>
		</div>
		<div class="contacts-map__frame">
			<?php if ($map) : ?>
				<?php echo $map; ?>
			<?php else : ?>
				<div class="map-placeholder">Кулагинский рынок</div>
			<?php endif; ?>
		</div>
	</div>
</section>
