<?php
/**
 * Template for displaying all single posts
 */
global $theme;
global $current_user;
get_currentuserinfo();
get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<header class="container">
    <div class="site-logo"><a href="/"><img src="<?php $theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
    <div class="page-title">
        <div class="page-title-inner">
            <div class="post-date-author"><?php the_date('F jS, Y');?> | <?php the_field('post_author'); ?></div>
            <h1><?php the_title();?></h1>
        </div>
    </div>
</header>
<div class="content container single-post">
    <?php if(get_field('post_image_file')) { ?><img src="<?php the_field('post_image_file') ?>" alt="<?php the_title() ?>" class="featured-image"><?php } ?>
    <?php the_content();?>
    <div class="post-footer">
    	<a href="/blog" class="back-link">BACK</a>
    	<div class="event-share">
    		<div class="share-label">SHARE THIS POST:</div>
    		<div class="share-icons">
				<a href="mailto:?subject=<?php the_title(); ?>&body=%20<?php the_permalink(); ?>" class="share-icon email"></a>
				<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo str_replace(' ','+',get_the_title()) ?>" target="_blank" class="share-icon twitter"></a>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share-icon facebook"></a>
			</div>
    	</div>
    </div>
</div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>