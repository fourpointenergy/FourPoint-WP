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

  <div class="emergency-contact-num">
  	<div class="container">
  		<h2>In case of an emergency call</h2>
  		<a href="#">303-303-3030</a>
  	</div>
  </div>

  <div class="container">
	<div class="form_wrap">
      <h2 class="contact-form-header">GENERAL INQUIRIES</h2>
      <?php the_content(); ?>
	</div>

	<div class="sidebar">
		<h2>Quick Contacts</h2>
		<div class="copy_split">
			<div class="side-content">
				<aside><p>Owner Relations</p></aside>
				<article><a href="#">303-303-3030</a></article>
			</div>
			<div class="side-content">
				<aside><p>Business Development</p></aside>
				<article><a href="#">303-303-3030</a></article>
			</div>
		</div>
		<aside class="card">
			<img src="<?php the_field('careers_image') ?>" />
			<div class="card-bottom">
				<div class="inner">
					<h3>Careers</h3>
					<p>Check out our careers page, it's awesome.</p>
					<button type="button" class="button btn-blue">See more</button>
				</div>
			</div>
		</aside>
	</div>
</div>

<section class="maps">
  <?php
  if( have_rows('map_blocks') ) while( have_rows('map_blocks') ): the_row(); ?>
	<div class="map-block">
		<div class="map-address <?php if( get_sub_field('block_content_background_color') == 'blue' ) echo(' blue-block') ?>">
			<div class="inner">
				<?php the_sub_field('block_content'); ?>
			</div>
		</div>
		<div class="google-map">
			<?php the_sub_field('map_code'); ?>
		</div>
	</div>
  <?php endwhile; ?>
</section>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
