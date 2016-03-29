<?php
/**
 * Template for displaying 404 Page (Page not found)
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1>Page Not Found</h1>

  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <p>Apologies, but the page you requested could not be found. <a href="/">Click here</a> to go the the homepage.</p>
  	</div>
  </div>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
