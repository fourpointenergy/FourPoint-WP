<?php
/**
 * Template for displaying all pages
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
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
    <?php the_content(); ?>
</div>
<?php endwhile;// end of the loop. ?>
</div>
        <!-- <div class="site-logo"><div class="container"><img src="<?php $theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></div></div> -->
<?php if ( in_array('brewer',$current_user->roles) ) {
        $brewery_name = get_user_meta($current_user->ID, 'brewery_name');
    ?>
<div class="user-profile-box">
    <p>Welcome,<br><a href="/update-account-info"><strong><?php echo $brewery_name[0]; ?></strong></a></p>
    <nav>
        <a href="/brewer-admin">ADMIN</a>
        <?php echo '<a href="'.wp_logout_url().'" class="logout-link">LOGOUT</a>' ?>
    </nav>
</div>
<?php } ?>
<?php
/* WP FOOTER */
get_footer();
?>
</body>
</html>