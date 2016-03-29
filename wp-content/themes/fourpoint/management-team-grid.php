<?php
/**
 * Loop for the management team grid
**/
$args = array(
  'post_type' => 'management-team',
  'order' => 'menu_order'
);
$management_team_qry = new WP_Query( $args );
?>
<?php if ( $management_team_qry->have_posts() ) : ?>
  <section class="grid">
    <ul>
    <?php while ( $management_team_qry->have_posts() ) : $management_team_qry->the_post(); ?>
      <li>
  			<a href="<?php the_permalink(); ?>">
  				<img src="<?php the_field("profile_thumbnail") ?>" alt="<?php the_title(); ?>"/>
  				<span></span>
  				<div>
  					<h4><?php the_title(); ?></h4>
  					<p><?php the_field("profile_job_title") ?></p>
  					<span>Read More</span>
  				</div>
  			</a>
  		</li>
    <?php endwhile; ?>
    </ul>
  </section>
<?php endif; ?>
