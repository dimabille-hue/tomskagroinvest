<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

?>

<?php get_template_part('template-parts/hero/hero'); ?>

<?php get_template_part('template-parts/activities/grid'); ?>

<?php get_template_part('template-parts/company/company'); ?>

<?php get_template_part('template-parts/news/grid'); ?>

<?php get_template_part('template-parts/documents/grid'); ?>

<?php get_template_part('template-parts/contacts/map'); ?>

<?php get_footer(); ?>
