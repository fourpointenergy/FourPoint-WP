<?php
/**
 * Page Name: Home
 *
 */
global $fp_theme;
get_header(); ?>
<!-- Event snippet for FourPoint_Energy_Landing_Page on https://fourpointenergy.com/: Please do not remove. Place this snippet on pages with events you’re tracking.
Creation date: 08/01/2018 -->
<script>gtag('event', 'conversion', {'allow_custom_scripts': true,'send_to': 'DC-8018126/landi0/fourp0+standard'});</script>
<noscript><img src="https://ad.doubleclick.net/ddm/activity/src=8018126;type=landi0;cat=fourp0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?" width="1" height="1" alt=""/></noscript>
<!-- End of event snippet: Please do not remove -->
<div id="page-loader">
  <svg width="80" height="80" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#00a8e2">
      <g fill="none" fill-rule="evenodd">
          <g transform="translate(1 1)" stroke-width="2">
              <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
              <path d="M36 18c0-9.94-8.06-18-18-18">
                  <animateTransform
                      attributeName="transform"
                      type="rotate"
                      from="0 18 18"
                      to="360 18 18"
                      dur="1s"
                      repeatCount="indefinite"/>
              </path>
          </g>
      </g>
  </svg>
</div>
<!-- <div class="info-banner">
  <p>
    <a href="/merger-information/">FourPoint Energy and Maverick Natural Resources Merger Information.</a>
  </p>
</div> -->
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
  if( have_rows('slides') ) : ?>
<div class="hero-slider">
  <?php while( have_rows('slides') ): the_row(); ?>
    <div class="hero-slider-item">
      <div class="the-slide-mobile" data-img-sm="<?php $fp_theme->echo_attached_image_url(null, get_sub_field('slide_photo_mobile'), null, 'Mobile Slider Photo') ?>">
        <img class="the-slide" src="" data-img-lg="<?php $fp_theme->echo_attached_image_url(null, get_sub_field('slide_photo_id'), null, 'Slider Photo') ?>" alt="<?php addslashes(the_sub_field('slide_title')) ?>">
        <div class="hero-slider-copy">
          <h1><?php the_sub_field('slide_title') ?></h1>
          <?php the_sub_field('slide_text') ?>
          <!-- <a href="<?php the_sub_field('button_link') ?>" class="button btn-blue slider-button" onclick="dataLayer.push({event:'button click',headline:'<?php echo addslashes(get_sub_field('slide_title')); ?>',label:'<?php echo addslashes(get_sub_field('button_text')); ?>'});">
            <?php the_sub_field('button_text') ?>
          </a> -->
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif; ?>
<div id="main-content" class="panels">
<?php
$counter = 1;
    if( have_rows('home_sections') ) while( have_rows('home_sections') ): the_row(); ?>
  <section class="panel panel-<?php the_sub_field('section_panel_color') ?>">
    <?php if( (get_sub_field('section_image')) && ($counter > 1) ) {?>
      <img src="<?php the_sub_field('section_image') ?>" class="panel-bg" alt="<?php the_sub_field('section_title') ?>">
    <?php } ?>
    <div class="text-block">
      <?php
      //determine button class based on being #2 or #3 in a series of 3
      if(get_sub_field('section_panel_color') && get_sub_field('section_panel_color') == 'white') {
        $btn_class = " btn-blue";
      } else {
        $btn_class = " btn-white";
      }
      ?>
        <h1><?php the_sub_field('section_title') ?></h1>
    <?php the_sub_field('section_content'); ?>
    <?php if( get_sub_field('section_button_link') ) { ?>
      <a href="<?php the_sub_field('section_button_link'); ?>" class="button<?php echo $btn_class ?>"<?php if( get_sub_field('section_button_new_window') ) { ?> target="_blank"<?php } ?> onclick="dataLayer.push({event:'button click',headline:'<?php the_sub_field('section_title') ?>',label:'<?php the_sub_field('section_button_text') ?>'});">
        <?php the_sub_field('section_button_text'); ?>
      </a>
    <?php } ?>
    </div>
  </section>
<?php $counter++;
  endwhile; ?>
</div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
