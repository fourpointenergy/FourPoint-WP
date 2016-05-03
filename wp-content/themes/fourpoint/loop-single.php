<?php
/**
 * The loop that displays a single post
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>
<div class="copy_split">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		 <div class="side-content">
			 <article>
				 <p><?php the_title(); ?></p>
				 <?php the_excerpt(); ?>
				 <a href="<?php the_permalink(); ?>">Read More</a>
			 </article>
		 </div>
	<?php endwhile; ?>
</div>
