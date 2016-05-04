<?php
/**
 * Template for displaying an individual Team Member
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <section class="team_profile">
  	<header class="clearfix">
  		<div class="team_title">
  			<span>
  				<h1><?php the_title(); ?></h1>
  				<h3><?php the_field('profile_job_title') ?></h3>
  			</span>
  		</div>
  		<img src="<?php the_field('profile_photo'); ?>">
  	</header>

  	<article>
      <h3><?php the_field('profile_bio_summary'); ?></h3>
  		<?php the_field('profile_bio'); ?>
  	</article>

  </section>
<?php endwhile;// end of the loop. ?>
<?php get_template_part('management-team-grid'); ?>
<?php get_footer(); ?>
