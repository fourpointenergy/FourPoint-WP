<?php
/**
 * Template for displaying the Management Team Page
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>
<?php endwhile; ?>
<?php // loop through the management team ?>
<?php get_template_part('management-team-grid'); ?>
<?php get_footer(); ?>
