<?php
/**
 * Header template
 **/
global $theme;
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<title>Fourpoint Energy<?php wp_title( '|', true, 'left' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	if(!isset($pageDescription)) {
		$pageDescription = 'FourPoint Energy is a private exploration and production company founded by the leadership team of Cordillera Energy Partners following the sale to Apache Corporation in 2012.'; }
	?>
	<meta name="description" content="<?php echo $pageDescription; ?>">
	<meta name="author" content="Karsh Hagan">
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<nav>
		<section>
			<a class="logo" href="/">
				<img src="<?php $theme->images_path() ?>/FourPoint_Logo.svg" alt="FourPoint Energy Logo">
			</a>
			<div class="nav_wrap">
				<div class="utility">
					<div class="search_wrap">
						<form class="search-container" action="">
						  <input id="search-box" type="text" class="search-box" name="q" />
						  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
						  <input type="submit" id="search-submit" />
						</form>
					</div>
					<?php
					$secondary_navitems = wp_get_nav_menu_items('secondary-nav');
					foreach($secondary_navitems as $navitem) {
					?>
				
					<a href="<?php echo $navitem->url ?>"<?php if($navitem->target != '') echo(' target="'.$navitem->target.'"') ?>><?php echo $navitem->title ?></a>
					<?php } ?>
					<!-- <a href="/contact">Contact</a> -->
					<!-- <a href="/business-opportunities">Leasing/Selling</a> -->
					<a href="#" class="lease-sell">
						<div class="qmark">
							<img src="<?php $theme->images_path() ?>/icons/icon-qmark.svg" />
						</div>
						<p class="tooltip">
							<?php echo get_option('header_tooltip_text') ?>
						</p>
					</a>
					<a class="btn" href="/login">Login</a>
				</div>
				<div id="mobile_menu" class="mobile_nav_icon">MENU&nbsp;&nbsp;<i class="fa fa-bars fa-2"></i></div>
				<?php
					$args = array(
						'theme_location' => 'main-menu',
						'menu_id' => 'main_nav',
						'container_class' => 'main_nav_wrap',
					);
					wp_nav_menu($args);
					?>
				<!-- <div class="main_nav_wrap">
					<ul id="main_nav">
				    	<li class="more"><a href="#">about</a>
				    		<ul class="submenu">
				    			<li><a href="/our-history">Our History</a></li>
				    			<li><a href="/general-content-page">Who We Are</a></li>
				    			<li><a href="/areas-of-operation">Areas of Operation</a></li>
				    			<li><a href="#">Business Opportunities</a></li>
				    			<li><a href="/management-team">Management Team</a></li>
				    		</ul>
				    	</li>
				    	<li class="more"><a href="#">Business & Community</a>
				    		<ul class="submenu">
				    			<li><a href="#">Business Strategy</a></li>
				    			<li><a href="#">Community Promise</a></li>
				    			<li><a href="#">Health, Safety &amp; Environment</a></li>
				    			<li><a href="/industry-affiliations">Industry Affiliations</a></li>
				    		</ul>
				    	</li>
				    	<li class="more wide"><a href="#">Interest Owners</a>
				    		<ul class="submenu">
				    			<li><a href="#">Owner Login</a></li>
				    			<li><a href="#">Owner Info</a></li>
				    			<li><a href="#">Check Stubs</a></li>
				    			<li><a href="#">JIM Statements</a></li>
				    			<li><a href="#">Change of Ownership</a></li>
				    			<li><a href="#">FAQ</a></li>
				    			<li><a href="#">Contact Info</a></li>
				    		</ul>
				    	</li>
				    	<li><a href="#" id="investors-link">Investors</a></li>
				    	<li class="more"><a href="#">News</a>
				    		<ul class="submenu">
				    			<li><a href="#">Features</a></li>
				    			<li><a href="/press-releases">Press Releases</a></li>
				    			<li><a href="/frequently-asked-questions">Presentations &amp; Fact Sheet</a></li>
				    			<li><a href="#">The Natural Gas Story</a></li>
				    			<li><a href="#">Events &amp; Media Gallery</a></li>
				    		</ul>
				    	</li>
				    	<li><a href="/join-our-team">Careers</a></li>
						<li class="mobile_utility"><a href="/contact">Contact</a></li>
						<li class="mobile_utility"><a href="#">Leasing/Selling</a></li>
						<li class="mobile_utility">
					    	<div class="search_wrap">
								<form class="search-container" action="">
								  <input id="search-box" type="text" class="search-box" name="q" />
								  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
								  <input type="submit" id="search-submit" />
								</form>
							</div>
						</li>
					</ul>
				</div> -->
			</div>
		</section>
	</nav>
