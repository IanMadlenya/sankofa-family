<?php get_header(); ?>
<div class="w3-content w3-container w3-text-dark-grey">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(__('(more...)')); ?></p>
<hr> <?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</div>
<?php get_footer(); ?>