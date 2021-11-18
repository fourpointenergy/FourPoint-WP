<?php
/**
 * Loop for the management team grid
**/
$args = array(
  'post_type' => 'management-team',
  'order' => 'menu_order',
  'post_status' => 'publish',
  'posts_per_page' => -1
);
$management_team_qry = new WP_Query( $args );
?>
<?php if ( $management_team_qry->have_posts() ) :
    $array = $management_team_qry->posts;
    // Desc sort by order property
  	usort($array,function($first,$second){
  	    return $first->order < $second->order;
  	});
  	$management_team_qry->posts = $array;
  ?>
  <section class="grid">
    <ul>
    <?php while ( $management_team_qry->have_posts() ) : $management_team_qry->the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>" onclick="dataLayer.push({event:'text link',headline:'<?php the_title(); ?>',label:'Read More'});">
          <img src="<?php the_field("profile_thumbnail") ?>" alt="<?php the_title(); ?>"/>
          <span class="shadow1"></span>
          <span class="shadow2"></span>
          <div>
            <p class="title"><?php the_title(); ?></p>
            <p class="subtitle"><?php the_field("profile_job_title") ?></p>
            <span>Read More</span>
          </div>
        </a>
      </li>
    <?php endwhile; ?>
    </ul>
  </section>
<?php endif; ?>
