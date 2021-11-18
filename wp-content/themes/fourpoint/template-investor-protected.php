<?php
/**
 * Template Name: Investor Protected
 */
global $fp_theme;
wp_get_current_user();
get_header();
?>
<?php if (have_posts()) while (have_posts()) : the_post(); ?>
  <?php if (
    array_key_exists('investor', $current_user->allcaps)
    && $current_user->allcaps['investor']
  ) {
  ?>
    <header id="main-content">
    	<h1><?php the_title(); ?></h1>
    	<p><?php the_field('page_description'); ?></p>
    </header>
    <div class="container general-content">
    	<div class="wrapper">
        <?php the_content(); ?>
    	</div>
    </div>
  <?php
  } else {
    wp_redirect("/wp-login.php?redirect_to=/investors");
  }
endwhile ?>
<?php get_footer(); ?>
