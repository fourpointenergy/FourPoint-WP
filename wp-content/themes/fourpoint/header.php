<?php
/**
 * Header template
 **/
global $theme;
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<title>Fourpoint Energy<?php wp_title( '|', true, 'left' ); ?></title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	if(!isset($pageDescription)) {
		$pageDescription = 'FourPoint Energy is a private exploration and production company founded by the leadership team of Cordillera Energy Partners following the sale to Apache Corporation in 2012.'; }
	?>
	<meta name="author" content="KarshHagan.com">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-46816205-1', 'fourpointenergy.com');
	  ga('send', 'pageview');
	
	</script>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<div class="secondary_search_wrap">
		<form role="search" method="get" id="secondary-searchform" class="searchform search-container" action="/">
		  <input id="secondary-search-box" type="text" class="secondary-search-box search-box" name="s" />
		  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
		  <input type="submit" id="search-submit" />
		</form>
	</div>

	<nav>
		<section>
			<a class="logo" href="/">
				<img src="<?php $theme->images_path() ?>/FourPoint_Logo.svg" alt="FourPoint Energy Logo">
			</a>
			<div class="nav_wrap">
				<div class="utility">
					<div class="search_wrap">
						<form role="search" method="get" id="searchform" class="searchform search-container" action="/">
						  <input id="search-box" type="text" class="search-box" name="s" />
						  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
						  <input type="submit" id="search-submit" />
						</form>
					</div>
					<?php
					$secondary_navitems = wp_get_nav_menu_items('secondary-nav');
					foreach($secondary_navitems as $navitem) {
					?>
					<a href="/contact-us">Contact Us</a>
					<a href="<?php echo $navitem->url ?>"<?php if($navitem->target != '') echo(' target="'.$navitem->target.'"') ?>><?php echo $navitem->title ?></a>
					<?php } ?>
					<!-- <a href="/business-opportunities">Leasing/Selling</a> -->
					<a href="/business-community/business-opportunities/" class="lease-sell">
						<div class="qmark">
							<img src="<?php $theme->images_path() ?>/icons/icon-qmark.svg" />
						</div>
						<p class="tooltip">
							<?php echo get_option('header_tooltip_text') ?>
						</p>
					</a>
					<!--
					<?php echo wp_logout_url( site_url() ); ?>
				-->
					<a class="btn staff-login-btn" href="#">Staff Login</a>
				</div>
				<div id="mobile_menu" class="mobile_nav_icon">MENU&nbsp;<i class="fa fa-bars fa-2"></i></div>
				<div class="mobile-search-icon" id="js-mobile-search-icon"><i class="fa fa-search search-icon"></i></div>
				<?php
					$args = array(
						'theme_location' => 'main-menu',
						'menu_id' => 'main_nav',
						'container_class' => 'main_nav_wrap',
					);
					wp_nav_menu($args);
					?>
			</div>
		</section>
	</nav>
