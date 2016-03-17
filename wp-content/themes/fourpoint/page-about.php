<?php
/**
 * Template for displaying the about page
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
    <!-- BEGIN TIMELINE -->
    
</div>
<div class="timelineFlat tl1">
	<!-- CARDS -->
	<div class="timeline_items">
		<?php
			$args = array(
                'posts_per_page'   => -1,
                'post_type'        => 'timeline_item',
                'post_status'      => 'publish',
                'order'             => 'ASC',
                'suppress_filters' => true
            );
            $timeline_items = get_posts( $args );
            foreach($timeline_items as $timeline_item) {
		?>
		<div class="item" data-id="<?php echo get_field('timeline_item_year',$timeline_item->ID) ?>">
			<img src="<?php echo get_field('timeline_item_photo',$timeline_item->ID) ?>" alt=""/>
			<h2><?php echo get_field('timeline_item_year',$timeline_item->ID) ?></h2>
			<span><?php echo $timeline_item->post_content ?></span>
		</div>
		<?php } ?>
	</div>
</div> <!-- /END TIMELINE -->
<!-- </div> -->
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>