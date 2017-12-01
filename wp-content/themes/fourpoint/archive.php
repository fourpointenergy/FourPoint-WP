<?php
/**
 * Template for displaying Archive pages
 *
 */
global $theme;
global $current_user;
wp_get_current_user();
get_header();
?>
<header class="container">
    <div class="site-logo"><a href="/"><img src="<?php $theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
    <div class="page-title">
        <div class="page-title-inner">
            <h1><?php the_title(); ?> CONTROLS:</h1>
            <p><?php echo get_field('page_description'); ?></p>
        </div>
    </div>
</header>
<div class="controls container">

    <?php
    $args = array(
    'type'                     => 'post',
    'orderby'                  => 'name',
    'hide_empty'               => 1,
);
    $post_categories = get_categories( $args );
    var_dump($post_categories);
?>
    <div class="category-select">
        <select name="region" data-script="PostCategorySelector">
            <option value="*">All Posts</option>

        </select>
    </div>
</div>
<div class="content container">
    <div class="posts blocks">
    	<?php get_template_part( 'loop', 'archive' ); ?>
    </div>
</div>
<?php
get_footer();
?>
</body>
</html>