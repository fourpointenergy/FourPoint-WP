<?php
/**
 * Page Name: Home
 *
 */
global $theme;
get_header(); ?>
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
					<a href="<?php the_sub_field('button_link') ?>" class="button btn-blue" style="display:inline-block"><?php the_sub_field('button_text') ?></a>
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
	<section class="panel">
    <?php if( (get_sub_field('section_image')) && ($counter > 1) ) {?>
      <img src="<?php the_sub_field('section_image') ?>" class="panel-bg">
    <?php } ?>
    <div class="text-block">
      <?php
      //determine button class based on being #2 or #3 in a series of 3
      $btn_class = "";
      if( ($counter % 3 == 0) || ($counter % 3 == 2) ) {
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