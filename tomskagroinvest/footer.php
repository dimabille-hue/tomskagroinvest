<?php

if (!defined('ABSPATH')) {
	exit;
}

?>

	<footer class="site-footer">

		<div class="container">

			<div class="footer-grid">

				<div class="footer-column">

					<div class="footer-logo">

						<?php

						if (function_exists('the_custom_logo')) {

							the_custom_logo();

						}

						?>

					</div>

					<p class="footer-description">

						Агентство инвестиционного развития.
						Сопровождение инвестиционных проектов,
						развитие инвестиционного климата
						и поддержка инвесторов.

					</p>

				</div>

				<div class="footer-column">

					<h3>

						Разделы сайта

					</h3>

					<?php

					wp_nav_menu([

						'theme_location' => 'footer',

						'container' => false,

						'menu_class' => 'footer-menu',

						'fallback_cb' => false

					]);

					?>

				</div>

				<div class="footer-column">

					<h3>

						Контакты

					</h3>

					<ul class="footer-contacts">

						<?php if (tai_option('tai_phone')) : ?>

							<li>

								<strong>

									Телефон

								</strong>

								<a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', tai_option('tai_phone'))); ?>">

									<?php echo esc_html(tai_option('tai_phone')); ?>

								</a>

							</li>

						<?php endif; ?>

						<?php if (tai_option('tai_email')) : ?>

							<li>

								<strong>

									E-mail

								</strong>

								<a href="mailto:<?php echo esc_attr(tai_option('tai_email')); ?>">

									<?php echo esc_html(tai_option('tai_email')); ?>

								</a>

							</li>

						<?php endif; ?>

						<?php if (tai_option('tai_address')) : ?>

							<li>

								<strong>

									Адрес

								</strong>

								<span>

									<?php echo nl2br(esc_html(tai_option('tai_address'))); ?>

								</span>

							</li>

						<?php endif; ?>

					</ul>

				</div>

				<div class="footer-column">

					<h3>

						Полезная информация

					</h3>

					<ul class="footer-links">

						<li>

							<a href="<?php echo esc_url(home_url('/search')); ?>">

								Поиск по сайту

							</a>

						</li>

						<li>

							<a href="<?php echo esc_url(home_url('/sitemap')); ?>">

								Карта сайта

							</a>

						</li>

						<li>

							<a href="<?php echo esc_url(home_url('/documents')); ?>">

								Документы

							</a>

						</li>

						<li>

							<a href="<?php echo esc_url(home_url('/contacts')); ?>">

								Контакты

							</a>

						</li>

					</ul>

				</div>

			</div>

			<div class="footer-bottom">

				<div>

					© <?php echo esc_html(date_i18n('Y')); ?>

					<?php bloginfo('name'); ?>

				</div>

				<div>

					Все права защищены.

				</div>

			</div>

		</div>

	</footer>

<?php

wp_footer();

?>

</body>

</html>
