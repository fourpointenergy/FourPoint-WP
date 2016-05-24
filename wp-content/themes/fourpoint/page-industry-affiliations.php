<?php
/**
 * Template for displaying Industry Affiliations (with logos)
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>
  <?php if ( have_rows('affiliate_logos') ) : ?>
  <section class="affiliation_logos">
    <?php while ( have_rows('affiliate_logos') ) : the_row(); ?>
      <?php if(get_sub_field('affiliate_logo')) { ?>
        <a href="<?php the_sub_field('affiliate_link') ?>" class="logo" target="_blank"><img src="<?php the_sub_field('affiliate_logo') ?>" alt="<?php the_sub_field('affiliate_name') ?>"></a>
      <?php } else { ?>
        <img src="<?php the_sub_field('affiliate_logo') ?>" alt="<?php the_sub_field('affiliate_name') ?>">
      <?php } ?>
    <?php endwhile; ?>
  </section>
<?php endif; ?>
<?php endwhile;// end of the loop. ?>
<?php if(get_field('content_below_listing',$post_id)) : ?>
  <div class="container general-content">
   <div class="wrapper">
     <?php the_field('content_below_listing',$post_id); ?>
   </div>
 </div>
<?php endif; ?>
<?php get_footer(); ?>
