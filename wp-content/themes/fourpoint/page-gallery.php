<?php
/**
 * Template for displaying the media gallery
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <?php
      $args = array(
        'post_type' => 'gallery-set',
        'order' => 'menu_order',
        'post_status' => 'publish'
      );
        $gallery_qry = new WP_Query( $args );
      ?>
      <?php if ( $gallery_qry->have_posts() ) : ?>
      <div class="row">
        <?php
          $gallery_counter = 1;
          while ( $gallery_qry->have_posts() ) : $gallery_qry->the_post(); ?>
          <!-- This is an image gallery. -->
      		<div class="gallery sortable" data-type="image">
            <?php while( have_rows('galleries') ): the_row(); ?>
              <?php if($gallery_counter == 1) { ?>
      			<!-- This is the thumbnail, what you click to launch gallery -->
      			<a class="fancybox" rel="gallery<?php echo $gallery_counter ?>" title="<?php the_title(); ?>" href="<?php the_sub_field('image_src') ?>">
      				<img src="<?php the_field('gallery_thumb') ?>" alt="<?php the_title(); ?>" />
      				<span><?php the_title(); ?></span>
      			</a>
            <?php } else { ?>
      			<!-- These are the hidden images, only viewable if you click on the thumbnail and cycle through. -->
      			<div class="gallery-img-hidden">
              <?php if( get_sub_field('video_src') ) { ?>
      				<a class="fancybox fb-video" rel="gallery<?php echo $gallery_counter; ?>" href="<?php the_sub_field('video_src') ?>"><img src="<?php the_sub_field('image_src') ?>" alt="<?php the_sub_field('image_title') ?>" /></a>
              <?php } else { ?>
      				<a class="fancybox" rel="gallery<?php echo $gallery_counter ?>" title="<?php the_sub_field('image_title') ?>" href=""><img src="<?php the_sub_field('image_src') ?>" alt="<?php the_sub_field('image_title') ?>" /></a>
              <?php } ?>
      			</div>
            <?php }
            endwhile; ?>
      		</div>
        <?php
          $gallery_counter++;
        endwhile; ?>
      </div>
      <?php the_content(); ?>
  	</div>
  </div>
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
