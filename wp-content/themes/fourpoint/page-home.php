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
			<div class="the-slide" data-img-sm="<?php $theme->echo_attached_image_url(null, get_sub_field('slide_photo_mobile'), null, 'Mobile Slider Photo') ?>" data-img-lg="<?php $theme->echo_attached_image_url(null, get_sub_field('slide_photo_id'), null, 'Slider Photo') ?>">
				<div class="hero-slider-copy">
					<h1><?php the_sub_field('slide_title') ?></h1>
					<p><?php the_sub_field('slide_text') ?></p>
					<a href="<?php the_sub_field('button_link') ?>" class="button btn-blue" style="display:inline-block"><?php the_sub_field('button_text') ?></a>
				</div>
			</div>
		</div>
  <?php endwhile; ?>
<!--
		<div class="hero-slider-item hero-slider-item-2	">
			<div class="the-slide" data-img-sm="<?php $theme->images_path() ?>/home2-mobile.jpg" data-img-lg="<?php $theme->images_path() ?>/home2.jpg">
				<div class="hero-slider-copy">
					<h1>Experience Intro</h1>
					<p>Green juice eiusmod celiac cray mumblecore. Enim drinking vinegar plaid id, officia nostrud wayfarers flexitarian knausgaard. Mustache drinking vinegar bitters beard.</p>
					<button type="button" class="button btn-blue">Read Our History</button>
				</div>
			</div>
		</div>

		<div class="hero-slider-item hero-slider-item-3">
			<div class="the-slide" data-img-sm="<?php $theme->images_path() ?>/home3-mobile.jpg" data-img-lg="<?php $theme->images_path() ?>/home3.jpg">
				<div class="hero-slider-copy">
					<h1>Experience Intro</h1>
					<p>Green juice eiusmod celiac cray mumblecore. Enim drinking vinegar plaid id, officia nostrud wayfarers flexitarian knausgaard. Mustache drinking vinegar bitters beard.</p>
					<button type="button" class="button btn-blue">Read Our History</button>
				</div>
			</div>
		</div>

		<div class="hero-slider-item hero-slider-item-4">
			<div class="the-slide" data-img-sm="<?php $theme->images_path() ?>/home4-mobile.jpg" data-img-lg="<?php $theme->images_path() ?>/home4.jpg">
				<div class="hero-slider-copy">
					<h1>Experience Intro</h1>
					<p>Green juice eiusmod celiac cray mumblecore. Enim drinking vinegar plaid id, officia nostrud wayfarers flexitarian knausgaard. Mustache drinking vinegar bitters beard.</p>
					<button type="button" class="button btn-blue">Read Our History</button>
				</div>
			</div>
		</div> -->

	</div>
<?php endif; ?>
	<section class="text-block panel panel-white">
		<h1><?php the_field('section_1_title'); ?></h1>
		<?php the_field('section_1_content'); ?>
	</section>

	<div class="home-img-full experience-img"></div>

	<section class="text-block panel panel-blue">
		<h1><?php the_field('section_2_title'); ?></h1>
		<?php the_field('section_2_content'); ?>
		<button type="button" class="button btn-white"><?php the_field('section_2_button_text'); ?></button>
	</section>

	<div class="home-img-full experience-img"></div>

	<section class="text-block panel panel-gray">
		<h1><?php the_field('section_3_title'); ?></h1>
		<?php the_field('section_3_content'); ?>
		<button type="button" class="button btn-white"><?php the_field('section_3_button_text'); ?></button>
	</section>

	<div class="home-img-full experience-img"></div>

	<section class="text-block panel panel-white">
		<h1><?php the_field('section_4_title'); ?></h1>
		<?php the_field('section_4_content'); ?>
		<button type="button" class="button btn-blue"><?php the_field('section_4_button_text'); ?></button>
	</section>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
