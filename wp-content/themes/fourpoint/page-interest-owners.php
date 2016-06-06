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
      <?php the_content(); ?>
      <div class="row io-logins">
        <aside class="card login-card">
          <img src="<?php the_field('pds_energy_login_box_image') ?>">
          <div class="card-bottom">
            <div class="inner">
              <h2>PDS Energy Login</h2>
              <p><?php the_field('pds_energy_login_box_content') ?></p>
              <a href="https://secure.pds-austin.com/fourpoint/login.asp" class="button btn-blue" target="_blank">Login</a>
            </div>
          </div>
        </aside>

        <aside class="card login-card">
          <img src="<?php the_field('energylink_login_box_image') ?>">
          <div class="card-bottom">
            <div class="inner">
              <h2>EnergyLink Login</h2>
              <p><?php the_field('energylink_login_box_content') ?></p>
              <a href="/energylink-login" class="button btn-blue">Login</a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
