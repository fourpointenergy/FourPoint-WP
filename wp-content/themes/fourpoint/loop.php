<?php
/**
 * The loop that displays posts
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
global $fp_theme;
global $current_user;
wp_get_current_user();
get_header();
?>
<header class="container">
    <div class="site-logo"><a href="/"><img src="<?php $fp_theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
    <div class="page-title">
        <div class="page-title-inner">
            <h1>BLOG</h1>
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
    $categories = get_categories( $args );
?>
    <div class="category-select">
        <select name="category" data-script="PostCategorySelector">
            <option value="*">All Posts</option>
            <?php foreach($categories as $category) { ?>
                <option value="<?php echo $category->slug ?>"><?php echo $category->name ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="content container">
    <div class="posts blocks">
    	<div class="gutter-sizer"></div>
    	<?php
    		$loop_index = 0;
    		while (have_posts()): the_post();
    		$block_size = $fp_theme->get_random_block_size();
    		if($loop_index == 0) {
    			$block_size = 'large';
    		}
            $post_categories = get_the_category();
            $category_classes = array();
            foreach($post_categories as $category) {
                array_push($category_classes,$category->slug);
            }
            // var_dump($post_categories);
    	?>
		<div class="post block <?php echo $block_size ?> <?php echo implode(" ",$category_classes) ; ?>">
			<?php if(get_field('post_image_file')) { ?><a href="<?php the_permalink()?>"><img src="<?php the_field('post_image_file') ?>" alt="<?php the_title() ?>"></a><?php } ?>
			<div class="entry-content">
				<div class="publish-date"><?php the_date('F jS, Y');?></div>
				<div class="post-title"><?php the_title();?></div>
				<div class="post-excerpt"><?php the_excerpt();?></div>
				<a href="<?php the_permalink()?>" class="more-details-link">Read More</a>
			</div><!-- .entry-content -->
		</div>
		<?php
			$loop_index++;
			endwhile;  ?>
    </div>
</div>
<?php
get_footer();
?>
</body>
</html>