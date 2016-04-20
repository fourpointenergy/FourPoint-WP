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
					<a href="/contact">Contact</a>
					<a href="#">Leasing/Selling</a>
					<a href="#" class="lease-sell">
						<div class="qmark">
							<img src="<?php $theme->images_path() ?>/icons/icon-qmark.svg" />
						</div>
						<p class="tooltip">
							typewriter vice venmo austin. +1 cornhole four loko truffaut, listicle swag street art gochujang disrupt chambray man bun. Master cleanse asymmetrical kale chips meditation sustainable. Shoreditch yr iPhone irony tote bag, forage post-ironic aesthetic
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
			</div>
		</section>
	</nav>
