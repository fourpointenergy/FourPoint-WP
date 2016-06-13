<?php
/**
 * Template for displaying all pages
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <div class="row io-logins">
        <aside class="card login-card">
          <?php the_content(); ?>
          <img src="/wp-content/themes/fourpoint/assets/images/tree-test2.jpg">
          <div class="card-bottom">
            <div class="inner">
              <h2>PDS Energy Login</h2>
              <a href="https://secure.pds-austin.com/fourpoint/login.asp" class="button btn-blue" target="_blank">Login</a>
            </div>
          </div>
        </aside>

        <aside class="card login-card energylink-login-wrap">
          <?php the_field('energylink_login_box_content') ?>
        </aside>
      </div>
    </div>
  </div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
