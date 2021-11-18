<?php
/**
 * Template Name: Press Releases
 *
 */
global $theme;
global $current_user;
get_currentuserinfo();
get_header();
$region="*";
if($_REQUEST['region']) {
    $region = $_GET['region'];
}
?>
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
    <div class="press-releases">
      <div class="cbg-press-releases">
        <h2>FROM THE GUILD</h2>
    <?php
        $args = array(
        'post_type'         => 'press-release',
        'status'            => 'publish',
        'numberposts'    => -1
        );
        $the_query = new WP_Query( $args );
        while ($the_query->have_posts()): $the_query->the_post(); ?>
    <?php
      $brewery_name = "";
        if(get_field('brewery')) {
            $brewer = get_field('brewery');
            $brewery_name = get_the_author_meta( 'brewery_name', $brewer['ID'] );
        } else {
            $brewery_user_id = get_the_author_meta( 'ID' );
            $brewery_name = get_the_author_meta( 'brewery_name' );
        }
        if(!$brewery_name || $brewery_name == "") {
        $release_date = '';
        $date = DateTime::createFromFormat('m/d/Y', get_field('press_release_date'));
        if($date) {
            $release_date = $date->format('F j, Y');
        }
        if(get_field('press_release_url') && get_field('press_release_url') != "[]") {
            $press_release_url = get_field('press_release_url');
        } else {
            $press_release_url = get_field('press_release_pdf');
        }
    ?>
        <div class="press-release">
            <a href="<?php echo $press_release_url ?>" target="_blank"><?php the_title() ?></a><?php if($release_date != '') { echo(" | "); echo $release_date; } ?>
        </div>
    <?php }
        endwhile ?>
      </div>

      <div class="brewery-press-releases">
        <h2>ALL PRESS</h2>
    <?php
        $args = array(
        'post_type'         => 'press-release',
        'status'            => 'publish',
        'numberposts'    => -1
        );
        $the_query = new WP_Query( $args );
        while ($the_query->have_posts()): $the_query->the_post(); ?>
    <?php
        $brewery_name = "";
        if(get_field('brewery')) {
            $brewer = get_field('brewery');
            $brewery_name = get_the_author_meta( 'brewery_name', $brewer['ID'] );
        } else {
            $brewery_user_id = get_the_author_meta( 'ID' );
            $brewery_name = get_the_author_meta( 'brewery_name' );
        }
        if($brewery_name && $brewery_name != "") {
          $release_date = '';
          $date = DateTime::createFromFormat('m/d/Y', get_field('press_release_date'));
          if($date) {
              $release_date = $date->format('F j, Y');
          }
          if(get_field('press_release_url') && get_field('press_release_url') != "[]") {
              $press_release_url = get_field('press_release_url');
          } else {
              $press_release_url = get_field('press_release_pdf');
          }
    ?>
        <div class="press-release">
          <?php
          //var_dump($brewery_name); ?>
            <a href="<?php echo $press_release_url ?>" target="_blank"><?php the_title() ?></a><?php if($release_date != '') { echo(" | ".$release_date); } ?><?php if($brewery_name && $brewery_name != '') { echo(" | Posted By "); echo $brewery_name; } ?>
        </div>
    <?php
      }
      endwhile ?>
      </div>
    </div>
</div>
<?php
get_footer();
?>
</body>
</html>
