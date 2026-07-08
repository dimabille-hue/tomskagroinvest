<?php

if (!defined('ABSPATH')) {
	exit;
}

$logo = tai_option('header_logo');
$phone = tai_option('header_phone');
$email = tai_option('header_email');

$show_phone = tai_option('show_phone');
$show_email = tai_option('show_email');
$show_search = tai_option('show_search');
$show_accessibility = tai_option('show_accessibility');

$button_text = tai_option('header_button_text');
$button_url  = tai_option('header_button_url');

$banner_show = tai_option('show_header_banner');
$banner_text = tai_option('header_banner_text');
$banner_link = tai_option('header_banner_link');

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<meta
	name="viewport"
	content="width=device-width, initial-scale=1.0"
>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php if ($banner_show && $banner_text) : ?>

<div class="top-banner">

	<div class="container">

		<?php if ($banner_link) : ?>

			<a
				href="<?php echo esc_url($banner_link); ?>"
			>

				<?php echo esc_html($banner_text); ?>

			</a>

		<?php else : ?>

			<?php echo esc_html($banner_text); ?>

		<?php endif; ?>

	</div>

</div>

<?php endif; ?>

<header class="site-header">

	<div class="header-top">

		<div class="container">

			<div class="header-top__left">

				<a
					class="header-logo"
					href="<?php echo esc_url(home_url('/')); ?>"
				>

				
					<?php tai_logo(); ?>

				
				</a>

				<div class="header-title">

					<div class="header-title__name">

						<?php bloginfo('name'); ?>

					</div>

					<div class="header-title__description">

						<?php bloginfo('description'); ?>

					</div>

				</div>

			</div>

			<div class="header-top__right">
			    <?php if ($show_phone && $phone) : ?>

<div class="header-contact">

	<svg class="icon">

		<use xlink:href="#icon-phone"></use>

	</svg>

	<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>">

		<?php echo esc_html($phone); ?>

	</a>

</div>

<?php endif; ?>

<?php if ($show_email && $email) : ?>

<div class="header-contact">

	<svg class="icon">

		<use xlink:href="#icon-mail"></use>

	</svg>

	<a href="mailto:<?php echo esc_attr($email); ?>">

		<?php echo esc_html($email); ?>

	</a>

</div>

<?php endif; ?>

<?php if ($button_text && $button_url) : ?>

<a

	class="btn btn-primary"

	href="<?php echo esc_url($button_url); ?>"

>

	<?php echo esc_html($button_text); ?>

</a>

<?php endif; ?>

<?php if ($show_accessibility) : ?>

<button

	class="accessibility-toggle"

	type="button"

	id="accessibility-toggle"

>

Версия для слабовидящих

</button>

<?php endif; ?>

</div>

</div>

</div>

<nav class="main-navigation">

	<div class="container">

		<button

			class="mobile-menu-toggle"

			aria-label="Меню"

		>

			<span></span>

			<span></span>

			<span></span>

		</button>

		<?php

		wp_nav_menu([

			'theme_location' => 'primary',

			'container' => false,

			'menu_class' => 'main-menu',

			'fallback_cb' => 'tai_primary_menu_fallback'

		]);

		?>

		<?php if ($show_search) : ?>

			<div class="header-search">

				<form

					action="<?php echo esc_url(home_url('/')); ?>"

					method="get"

				>

					<input

						type="search"

						name="s"

						placeholder="Поиск по сайту..."

						value="<?php echo esc_attr(get_search_query()); ?>"

					>

					<button type="submit">

						Поиск

					</button>

				</form>

			</div>

		<?php endif; ?>

	</div>

</nav>

<div class="mobile-menu" aria-hidden="true">

	<div class="mobile-menu-inner">

		<?php

			wp_nav_menu([

				'theme_location' => 'primary',

				'container' => false,

				'menu_class' => 'mobile-nav',

				'fallback_cb' => 'tai_primary_menu_fallback'

			]);

		?>

		<div class="mobile-contacts">

			<?php if ($show_phone && $phone) : ?>

				<a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">

					<?php echo esc_html($phone); ?>

				</a>

			<?php endif; ?>

			<?php if ($show_email && $email) : ?>

				<a href="mailto:<?php echo esc_attr($email); ?>">

					<?php echo esc_html($email); ?>

				</a>

			<?php endif; ?>

		</div>

	</div>

</div>

</header>

<main class="site-content">
