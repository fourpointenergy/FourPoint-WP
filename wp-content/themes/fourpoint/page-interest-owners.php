<?php
/**
 * Template for displaying all pages
 */
global $fp_theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header id="main-content">
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <div class="row io-logins">
        <aside class="card login-card energylink-login-wrap">
          <?php the_field('energylink_login_box_content') ?>
        </aside>
      </div>
    </div>
  </div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
