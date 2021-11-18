<?php
/**
 * Template for displaying the Our History Page
 */
global $fp_theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header id="main-content">
    <h1><?php the_title(); ?></h1>
    <p><?php the_field('page_description'); ?></p>
  </header>
  <?php
  // check if the repeater field has rows of data
if( have_rows('timeline_items') ): ?>
  <ul id="flipper" class="content_stack container">
  <?php
    $counter = 1;
    while ( have_rows('timeline_items') ) : the_row(); ?>
      <li class="<?php if($counter == 1) { echo('already-visible'); } if($counter > 6) { echo(' collapsed'); } ?>">
        <aside data-bg="bg_<?php echo $counter ?>" style="background-image:url('<?php the_sub_field('timeline_image'); ?>')">
          <h2><?php the_sub_field('timeline_year') ?></h2>
        </aside>
        <article>
          <p><?php the_sub_field('timeline_description'); ?></p>
        </article>
      </li>
<?php
    $counter++;
    endwhile; ?>
</ul>
<? if($counter > 6) { ?>
  <div class="expand-history">
    <div class="expand-history-label">
      View More
      <svg class="icon icon-plus expand-history-icon"><use xlink:href="#icon-plus"></use></svg>
    </div>
  </div>
<? } ?>
<?php
endif;
?>
<?php endwhile;// end of the loop. ?>
<?php if(get_field('content_below_listing',$post_id)) : ?>
  <div class="container general-content">
   <div class="wrapper">
     <?php the_field('content_below_listing',$post_id); ?>
   </div>
 </div>
<?php endif; ?>
<?php get_footer(); ?>
