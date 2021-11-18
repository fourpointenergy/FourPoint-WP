<script>
	// create GTM's dataLayer, if it is not already present
	window.dataLayer = window.dataLayer || [];
	<?
	// global $post;
	$page = get_queried_object();
	$parent = get_post($page->post_parent);
	if (isset($parent->post_title) and $page->post_title !== $parent->post_title) :
	?>
		window.dataLayer.push({
			event: 'page load',
			main_menu: '<?= $page->post_title ?>',
			sub_menu: '<?= $parent->post_title ?>'
		});
	<? else : ?>
		window.dataLayer.push({
			event: 'page load',
			main_menu: '<?= $page->post_title ?>'
		});
	<? endif; ?>
</script>
