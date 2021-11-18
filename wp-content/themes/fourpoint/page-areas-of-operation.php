<?php
/**
 * Template for displaying all pages
 */
global $fp_theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header class="alt_leader">
    <div id="main-content" class="container">
    	<h1><?php the_title(); ?></h1>
      <p><?php the_field('page_description'); ?></p>
			<?php the_field('map_iframe_code') ?>
    </div>
  </header>
<?php endwhile;// end of the loop. ?>
<?php if(get_field('content_below_listing',$post_id)) : ?>
  <div class="container general-content">
   <div class="wrapper">
     <?php the_field('content_below_listing',$post_id); ?>
   </div>
 </div>
<?php endif; ?>
<?php get_footer(); ?>
