<?php
/**
 * Template for displaying the Management Team Page
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header id="main-content">
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>
<?php endwhile; ?>
<?php // loop through the management team ?>
<?php get_template_part('board-of-directors-grid'); ?>
<?php if(get_field('content_below_listing',$post_id)) : ?>
  <div class="container general-content">
   <div class="wrapper">
     <?php the_field('content_below_listing',$post_id); ?>
   </div>
 </div>
<?php endif; ?>
<?php get_footer(); ?>
