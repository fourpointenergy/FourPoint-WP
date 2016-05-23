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
      <a href="%%%%%" class="logo" target="_blank"><img src="<?php the_sub_field('affiliate_logo') ?>" alt="<?php the_sub_field('affiliate_name') ?>"></a>
    <?php endwhile; ?>
  </section>
<?php endif; ?>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
