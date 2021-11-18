<?php
/**
 * Template for displaying attachments
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

    <div id="container" class="single-attachment">
      <div id="content" role="main">
        <div id="main-content">

      <?php
      /*
       * Run the loop to output the attachment.
       * If you want to overload this in a child theme then include a file
       * called loop-attachment.php and that will be used instead.
       */
      get_template_part( 'loop', 'attachment' );
      ?>

       </div>
      </div><!-- #content -->
    </div><!-- #container -->

<?php get_footer(); ?>
