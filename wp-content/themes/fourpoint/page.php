<?php
/**
 * Template for displaying all pages
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<header class="container">
   <div class="site-logo"><a href="/"><img src="<?php $theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
    <div class="page-title">
        <div class="page-title-inner">
            <h1><?php the_title(); ?></h1>
            <p><?php echo get_field('page_description'); ?></p>
        </div>
    </div>
</header>
<div class="content container">
    <?php the_content(); ?>
</div>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>