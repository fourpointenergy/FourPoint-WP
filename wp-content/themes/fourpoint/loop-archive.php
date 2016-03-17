<?php while (have_posts()): the_post();?>
	<div class="post">
		<img src="<?php the_field('post_image_file') ?>" alt="<?php the_title() ?>">
		<div class="entry-content">
			<div class="post-title"><?php the_title();?></div>
			<div class="publish-date"><?php the_date('F jS, Y');?></div>
			<?php the_excerpt();?>
			<a href="<?php the_permalink()?>" class="more-details-link">Read More</a>
		</div><!-- .entry-content -->
	</div>
<?php endwhile; // End the loop. Whew. ?>