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
  		<h2 class="left-content"><?php the_field('top_bar_left_content'); ?></h2>
  		<!-- <h2></h2> -->
  		<a href="tel:<?php the_field('top_bar_right_content'); ?>" class="right-content"><?php the_field('top_bar_right_content'); ?></a>
      <!-- <span class="right-content"><?php the_field('top_bar_right_content'); ?></span> -->
  	</div>
  </div>

  <div class="container">
	<div class="form_wrap">
    <span class="general-form">
      <h2 class="contact-form-header">Who would you like to reach?</h2>
      <?php the_content(); ?>
    </span>
	</div>

	<div class="sidebar">
		<h2>Quick Contacts</h2>
    <?php if( have_rows('quick_contacts') ): ?>
		<div class="copy_split">
      <?php while ( have_rows('quick_contacts') ) : the_row(); ?>
			<div class="side-content">
				<aside><p><?php the_sub_field('contact_name'); ?></p></aside>
				<article><a href="tel:<?php echo(str_replace(".","-",get_sub_field('contact_phone'))) ?>"><?php the_sub_field('contact_phone') ?></a></article>
			</div>
      <?php endwhile; ?>
            <div class="side-content">
                <aside><p>Business Development</p></aside>
                <article><a href="mailto:businessdevelopment@fourpointenergy.com">Email</a></article>
            </div>
			<div class="side-content">
				<aside><p>Division Orders</p></aside>
				<article><a href="mailto:divisionorders@fourpointenergy.com">Email</a></article>
			</div>
		</div>
    <?php endif ?>
		<aside class="card">
			<img src="<?php the_field('careers_image') ?>" />
			<div class="card-bottom">
				<div class="inner">
					<h3>Careers</h3>
					<p><?php the_field('careers_box_text') ?></p>
					<!-- <button type="button" class="button btn-blue">See more</button> -->
					<a href="<?php the_field('careers_box_button_url') ?>" class="button btn-blue" style="display:inline-block"><?php the_field('careers_box_button_text') ?></a>
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
<?php if(get_field('content_below_listing',$post_id)) : ?>
  <div class="container general-content">
   <div class="wrapper">
     <?php the_field('content_below_listing',$post_id); ?>
   </div>
 </div>
<?php endif; ?>
<?php get_footer(); ?>
