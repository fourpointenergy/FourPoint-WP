<?php
/**
 * Page Name: Home
 *
 */
global $theme;
get_header(); ?>
<div id="page-loader">
  <svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#00a8e2">
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
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
  if( have_rows('slides') ) : ?>
<div class="hero-slider">
  <?php while( have_rows('slides') ): the_row(); ?>
		<div class="hero-slider-item">
			<div class="the-slide-mobile" data-img-sm="<?php $theme->echo_attached_image_url(null, get_sub_field('slide_photo_mobile'), null, 'Mobile Slider Photo') ?>">

        <img class="the-slide" src="" data-img-lg="<?php $theme->echo_attached_image_url(null, get_sub_field('slide_photo_id'), null, 'Slider Photo') ?>">
       
        <div class="hero-slider-copy">
					<h1><?php the_sub_field('slide_title') ?></h1>
					<p><?php the_sub_field('slide_text') ?></p>
					<a href="<?php the_sub_field('button_link') ?>" class="button btn-blue"><?php the_sub_field('button_text') ?></a>
				</div>
			</div>
		</div>
  <?php endwhile; ?>
	</div>
<?php endif; ?>
<div class="panels">
<?php
$counter = 1;
    if( have_rows('home_sections') ) while( have_rows('home_sections') ): the_row(); ?>
	<section class="panel panel-<?php the_sub_field('section_panel_color') ?>">
    <?php if( (get_sub_field('section_image')) && ($counter > 1) ) {?>
      <img src="<?php the_sub_field('section_image') ?>" class="panel-bg">
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
      <a href="<?php the_sub_field('section_button_link'); ?>" class="button<?php echo $btn_class ?>"<?php if( get_sub_field('section_button_new_window') ) { ?> target="_blank"<?php } ?>><?php the_sub_field('section_button_text'); ?></a>
    <?php } ?>
    </div>
	</section>
<?php $counter++;
  endwhile; ?>
</div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>