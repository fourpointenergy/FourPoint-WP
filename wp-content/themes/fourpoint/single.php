<?php
/**
 * Template for displaying all pages
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<?php if(get_field('page_description')) { ?><p><?php the_field('page_description'); ?></p><?php } ?>
  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <?php the_content(); ?>
  	</div>
  </div>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
