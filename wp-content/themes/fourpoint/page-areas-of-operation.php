<?php
/**
 * Template for displaying all pages
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header class="alt_leader">
    <section>
  	   <h1><?php the_title(); ?></h1>
       <p><?php the_field('page_description'); ?></p>
    </section>
  </header>
  <?php the_field('map_iframe_code') ?>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
