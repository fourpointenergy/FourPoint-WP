<?php
/**
 * Template for displaying FAQs
 */
 global $fp_theme;
 get_header(); ?>
 <?php if ( have_posts() ) : ?>
   <header id="main-content">
   	<h1>Search Results</h1>
   	<p>Results for: <?php the_search_query(); ?></p>
   </header>
	 <div class="copy_split">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $base_post_type_link = '';
        if( $post->post_type == 'press-release' ) {
          $base_post_type_link = site_url('/press-releases');
        }
        if( $post->post_type == 'faq' ) {
          $base_post_type_link = site_url('/faqs');
        }
        if( $post->post_type == 'fourpoint-feature' ) {
          $base_post_type_link = site_url('/features');
        }
        if( $post->post_type == 'company-update' ) {
          $base_post_type_link = site_url('/company-updates');
        }
        ?>
	 		 <div class="side-content">
	 			 <article>
	 				 <p><?php the_title(); ?></p>
           <!-- <a href="<?php the_permalink(); ?>">Read More</a> -->
             <?php if( get_field('external_link') || get_field('dont_show_read_more_link') ) { ?>
           <a href="<?php echo $base_post_type_link ?>" onclick="dataLayer.push({event:'exit link',headline:'search results',label:'<?php echo $base_post_type_link ?>'});">Read More</a>
             <?php } else { ?>
           <a href="<?php the_permalink(); ?>"  onclick="dataLayer.push({event:'text link',headline:'search results',label:'Read More'});">Read More</a>
             <?php } ?>
	 			 </article>
	 		 </div>
	 	<?php endwhile; ?>
	 </div>
 <?php else : ?>
   <header>
		 <h1>Search Results</h1>
		 <p>Sorry, no search results were found.</p>
   </header>
	 <div class="copy_split"></div>
<?php endif; ?>
<?php get_footer(); ?>
