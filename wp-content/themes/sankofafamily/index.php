<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(__('(more...)')); ?></p>
<hr> <?php endwhile; else:
header( 'Location: /notfound' ) ;
endif; ?>
<?php get_footer(); ?>