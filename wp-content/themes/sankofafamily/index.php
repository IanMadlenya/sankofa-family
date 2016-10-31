<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(__('(more...)')); ?></p>
<hr> <?php endwhile; else: ?>
<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
    <img src="http://www.smfos.com.au/images/sydney1.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
      <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">Page not found...</span>
    </div>
  </div>

<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<div class="w3-center">
<p><?php _e('We are sorry but the page you are looking for does not exist.'); ?></p>
</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>