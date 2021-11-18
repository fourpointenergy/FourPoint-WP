<?php
/**
 * Template for displaying Fourpoint Features
 */
 global $fp_theme;
 get_header(); ?>
 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   <?php $post_id = $post->ID; ?>
   <header id="main-content">
     <h1><?php the_title(); ?></h1>
     <p><?php the_field('page_description'); ?></p>
   </header>
 <?php endwhile;
 $args = array(
   'post_type'       => 'fourpoint-feature',
   'order'           => 'menu_order',
   'post_status'     => 'publish',
   'posts_per_page'  => -1,
   'meta_key' => 'post_display_date',
   'orderby' => 'meta_value_num',
   'order' => 'ASC'
 );
 $press_release_qry = new WP_Query( $args );
 $years = array();
 ?>
 <?php if ( $press_release_qry->have_posts() ) : ?>
   <div class="wrapper feature-container">
     <?php while ( $press_release_qry->have_posts() ) : $press_release_qry->the_post(); ?>

        <?php

          $date = strtotime( get_field('post_display_date') );
          $year = date('Y', $date );

          // $year = get_the_date( 'Y' );
          if ( ! isset( $years[ $year ] ) ) $years[ $year ] = array();
          $years[ $year ][] = array( 'title' => get_the_title(), 'external_link' => get_field('external_link'), 'readable_date' => get_field('post_display_date'), 'date' => $date );

        ?>

     <?php endwhile; ?>

      <?php

        if ( $years ) {

          krsort( $years );

          echo '<div class="clamshell-wrapper">';

            $counter = 0;

            foreach ( $years as $key => $value ) {

              $classes = '';
              if ($counter == 0) $classes .= ' open';

              echo '<div class="year">' . $key . '<svg class="icon icon-plus expand-history-icon' . $classes . '"><use xlink:href="#icon-plus"></use></svg></div>';

              if ( $value ) {

                echo '<ul class="posts ' . $classes . '">';

                foreach ( $value as $post ) {

                  echo '<li class="post">';
                    echo '<div class="date">' . $post['readable_date'] . '</div>';
                    echo '<div class="title"><a href="' . $post['external_link'] .'" target="_blank">' . $post['title'] . '</a>';
                  echo '</li>';

                }

                echo '</ul>';

                $counter ++;

              }

            }

          echo '</div>';

        }

      // echo '<pre>';
      //   print_r( $years );
      // echo '</pre>';

      ?>
   </div>
 <?php endif; ?>

<?php get_footer(); ?>
