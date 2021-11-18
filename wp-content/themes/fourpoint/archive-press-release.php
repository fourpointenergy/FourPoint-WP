<?php
/**
 * The loop that displays press releases
 *
 */
global $fp_theme;
global $current_user;
wp_get_current_user();
get_header();
$region="*";
if($_REQUEST['region']) {
    $region = $_GET['region'];
}
?>
<header id="main-content" class="container main-content">
    <div class="site-logo"><a href="/"><img src="<?php $fp_theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
    <div class="page-title">
        <div class="page-title-inner">
            <h1>Press Releases</h1>
            <p>Morbi vel orci malesuada, volutpat nisi in, congue turpis. Vivamus vel diam eu ligula malesuada aliquam.</p>
        </div>
    </div>
</header>
<div class="content container">
    <div class="press-releases">
    <?php while (have_posts()): the_post(); ?>
    <?php
        if(get_field('brewery')) {
            $brewer = get_field('brewery');
            $brewery_name = get_the_author_meta( 'brewery_name', $brewer['ID'] );
        } else {
            $brewery_user_id = get_the_author_meta( 'ID' );
            $brewery_name = get_the_author_meta( 'brewery_name' );
        }
        $release_date = '';
        $date = DateTime::createFromFormat('m/d/Y', get_field('press_release_date'));
        if($date) {
            $release_date = $date->format('F j, Y');
        }
        // var_dump($brewery_name)
    ?>
        <div class="press-release">
            <a href="<?php the_field('press_release_url'); ?>" target="_blank"><?php the_title() ?></a><?php if($release_date != '') { echo(" | "); echo $release_date; } ?><?php if($brewery_name && $brewery_name != '') { echo(" | "); echo $brewery_name; } ?>
        </div>
    <?php endwhile ?>
    </div>
</div>
<?php
get_footer();
?>
</body>
</html>
