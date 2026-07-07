<?php
if (!defined('ABSPATH')) exit;
if (have_posts()) : ?>
<section class="activities-grid"><div class="container"><div class="activities-grid__items">
<?php while(have_posts()): the_post();
get_template_part('template-parts/activities/card');
endwhile; ?>
</div><?php the_posts_pagination(); ?></div></section>
<?php else: ?>
<p><?php esc_html_e('Записи отсутствуют.', 'tomskagroinvest'); ?></p>
<?php endif; ?>
