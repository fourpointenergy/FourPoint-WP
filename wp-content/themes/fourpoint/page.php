<?php
/**
 * Template for displaying all pages
 */
global $fp_theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header id="main-content">
    <h1><?php the_title(); ?></h1>
    <p><?php the_sub_field('page_description'); ?></p>
  </header>

  <div class="container general-content">
    <div class="wrapper">
      <?php the_content(); ?>
    </div>
    <?php if( have_rows('page_elements') ): ?>
    <div class="page_elements">
      <?php while( have_rows('page_elements') ): the_row(); ?>

        <?php if( get_sub_field('section_title') ): ?>
        <div class="wrapper">
          <h2 class="section-title"><?php the_sub_field('section_title') ?></h2>
        </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'accordion' && have_rows('sections') ): ?>
          <div class="accordion">
          <?php while( have_rows('sections', $page_id) ): the_row(); $id = 'qa-'.uniqid(); ?>
            <div class="question">
              <h2>
                <a href="#<?php echo $id ?>" onclick="dataLayer.push({event:'text link',headline:'<?php the_sub_field('section_title') ?>',label:'<?php the_sub_field('title') ?>'});"><?php the_sub_field('title') ?> <?php svg('icon-plus') ?></a>
              </h2>
            </div>
            <div id="<?php echo $id ?>" class="answer">
              <?php the_sub_field('content') ?>
            </div>
          <?php endwhile; ?>
          </div>
          <script>
            jQuery(document).ready(function($){
              // Accordion toggle
              $('.accordion .question a').on('click', function(e){
                e.preventDefault();
                $(this).toggleClass('open');
                $($(this).attr('href')).slideToggle();
              });
              $('.accordion .answer').slideUp();
            });
          </script>

        <?php elseif( get_row_layout() == 'cta_cards' && have_rows('cards') ): ?>
          <div class="cta-cards pre-footer three-width-box">
          <?php while( have_rows('cards') ): the_row(); ?>
            <div class="box">
              <div class="shadow-border box-inner <?php the_sub_field('style') ?>">
                <?php svg('icon-'.get_sub_field('icon')) ?>
                <h4><?php the_sub_field('title') ?></h4>
                <hr>
                <p><?php the_sub_field('content') ?></p>
                <?php if( get_sub_field('button_text') ): ?>
                <a href="<?php the_sub_field('button_link') ?>" class="text-arrow-link" target="<?php echo get_sub_field('new_window') ? '_blank' : '' ?>" onclick="dataLayer.push({event:'text link',headline:'<?php the_sub_field('title') ?>',label:'<?php the_sub_field('button_text') ?>'});"><?php the_sub_field('button_text') ?></a>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          </div>

        <?php elseif( get_row_layout() == 'info_cards' && have_rows('cards') ): ?>
          <ol class="info-cards list-reset three-width-box ownership">
          <?php while( have_rows('cards') ): the_row(); ?>
            <li class="box <?php the_sub_field('style') ?>">
              <div class="box-inner">
                <div class="box-top">
                  <h3><?php the_sub_field('title') ?></h3>
                </div>
                <?php the_sub_field('content') ?>
              </div>
            </li>
          <?php endwhile; ?>
          </ol>

        <?php elseif( get_row_layout() == 'list_cards' && have_rows('cards') ): ?>
          <div class="list-cards pre-footer double-width-box">
          <?php while( have_rows('cards') ): the_row(); ?>
            <div class="box <?php the_sub_field('style') ?>">
              <div class="box-inner">
                <div class="box-wrap">
                  <h2><?php the_sub_field('title') ?></h2>
                  <?php the_sub_field('content') ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          </div>

        <?php elseif( get_row_layout() == 'number_cards' && have_rows('cards') ): ?>
          <ol class="number-cards list-reset counter three-width-box">
          <?php while( have_rows('cards') ):
            the_row();
            $bg_image = get_sub_field('style') == 'image-bg' ? wp_get_attachment_url( get_sub_field('background_image') ) : '';
            ?>
            <li class="box <?php the_sub_field('style') ?>">
              <div class="box-inner" style="background-image: url(<?php echo $bg_image ?>);">
                <div class="box-wrap">
                  <div class="box-top">
                    <h3><?php the_sub_field('subtitle') ?></h3>
                  </div>
                  <p><?php the_sub_field('content') ?></p>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
          </ol>
        <?php endif; ?>

      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
