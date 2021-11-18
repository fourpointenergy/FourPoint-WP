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

  <!-- <div class="emergency-contact-num">
    <div class="container">
      <h2 class="left-content"><?php the_field('top_bar_left_content'); ?></h2>
      <a href="tel:<?php the_field('top_bar_right_content'); ?>" class="right-content" onclick="dataLayer.push({event:'telephone',headline:'<?php the_field('top_bar_left_content'); ?>',label:'<?php the_field('top_bar_right_content'); ?>'});"><?php the_field('top_bar_right_content'); ?></a>
    </div>
  </div> -->

  <div class="container">
    <div class="form_wrap">
      <span class="general-form">
        <h2 class="contact-form-header">Who would you like to reach?</h2>
        <?php the_content(); ?>
      </span>
    </div>

    <div class="sidebar">
      <h2>Quick Contacts</h2>
      <div class="copy_split">
        <div class="side-content side-content-callout">
          <aside><p>Owner Information</p></aside>
          <article><a href="/owner-information/" title="Owner Information">More Info</a></article>
        </div>
        <?php if( have_rows('quick_contacts') ): ?>
        <?php while ( have_rows('quick_contacts') ) : the_row(); ?>
        <div class="side-content side-content-callout">
          <aside><p><?php the_sub_field('contact_name'); ?></p></aside>
          <article><a href="tel:<?php echo(str_replace(".","-",get_sub_field('contact_phone'))) ?>" onclick="dataLayer.push({event:'telephone',headline:'<?php the_sub_field('contact_name'); ?>',label:'<?php the_sub_field('contact_phone') ?>'});"><?php the_sub_field('contact_phone') ?></a></article>
        </div>
        <?php endwhile; ?>
        <?php endif ?>
        <div class="side-content side-content-callout">
          <aside><p>Business Development</p></aside>
          <article><a href="mailto:businessdevelopment@fourpointenergy.com" title="Business Development" onclick="dataLayer.push({event:'email',headline:'Business Development',label:'businessdevelopment@fourpointenergy.com'});">Email</a></article>
        </div>
        <!-- <div class="side-content">
          <aside><p>Division Orders</p></aside>
          <article><a href="mailto:divisionorders@fourpointenergy.com" title="Division Orders" onclick="dataLayer.push({event:'email',headline:'Division Orders',label:'divisionorders@fourpointenergy.com'});">Email</a></article>
        </div> -->

      </div>
      <!-- <aside class="card">
        <img src="<?php the_field('careers_image') ?>" alt="Careers" />
        <div class="card-bottom">
          <div class="inner">
            <h2>Careers</h2>
            <p><?php the_field('careers_box_text') ?></p>
            <a href="<?php the_field('careers_box_button_url') ?>" class="button btn-blue" style="display:inline-block" onclick="dataLayer.push({event:'button click',headline:'Careers',label:'<?php the_field('careers_box_button_text') ?>'});"><?php the_field('careers_box_button_text') ?></a>
          </div>
        </div>
      </aside> -->
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
