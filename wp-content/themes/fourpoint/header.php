<?php
/**
 * Header template
 **/
global $fp_theme;
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <title><?php wp_title( '|', true, 'left' ); ?> - Fourpoint Energy</title>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  if(!isset($pageDescription)) {
    $pageDescription = 'FourPoint Energy is a private exploration and production company founded by the leadership team of Cordillera Energy Partners following the sale to Apache Corporation in 2012.'; }
  ?>
  <meta name="author" content="KarshHagan.com">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
  <script>
    // disabled during the transition to GTM
    // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    // ga('create', 'UA-46816205-1', 'fourpointenergy.com');
    // ga('send', 'pageview');
  </script>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-M24R3TG');</script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'GTM-M24R3TG');
  </script>
  <!-- End Google Tag Manager -->
  <?php include_once get_template_directory() . '/inc/googleTagPageLoad.php'; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
  <div class="animsition">
  <a class="page-skipLink" href="#main-content" title="Skip to content">Skip to content</a>
  <div class="secondary_search_wrap">
    <form role="search" method="get" id="secondary-searchform" class="searchform search-container" action="/">
      <input id="secondary-search-box" type="text" class="secondary-search-box search-box" name="s" />
      <label for="secondary-search-box"><span class="fa fa-search search-icon">search</span></label>
      <input type="submit" id="secondary-search-submit" onsubmit="dataLayer.push({event:'form submit',headline:'header',label:'search'});" />
    </form>
  </div>

  <nav>
    <section>
      <a class="logo animsition-link" href="/" onclick="dataLayer.push({event:'text link',headline:'Header',label:'Fourpoint Energy'});">
        <img src="<?php $fp_theme->images_path() ?>/FourPoint_Logo.svg" alt="FourPoint Energy Logo">
      </a>
      <div class="nav_wrap">
        <div class="utility">
          <div class="search_wrap">
            <form role="search" method="get" id="searchform" class="searchform search-container" action="/">
              <input id="search-box" type="text" class="search-box" name="s" />
              <label for="search-box"><span class="fa fa-search search-icon">search</span></label>
              <input type="submit" id="search-submit" onsubmit="dataLayer.push({event:'form submit',headline:'header',label:'search'});" />
            </form>
          </div>
          <?php
          $secondary_navitems = wp_get_nav_menu_items('secondary-nav');
          foreach($secondary_navitems as $navitem) {
          ?>
          <a class="animsition-link" href="/contact-us" onclick="dataLayer.push({event:'text link',headline:'Header',label:'Contact Us'});">Contact Us</a>
          <a class="animsition-link" href="<?php echo $navitem->url ?>"<?php if($navitem->target != '') echo(' target="'.$navitem->target.'"') ?> onclick="dataLayer.push({event:'text link',headline:'Header',label:'<?php echo $navitem->title ?>'});"><?php echo $navitem->title ?></a>
          <?php } ?>
          <!-- <a href="/business-opportunities">Leasing/Selling</a> -->
          <a href="/business-community/business-opportunities/" class="lease-sell animsition-link" onclick="dataLayer.push({event:'text link',headline:'Header',label:'Question Mark'});">
            <div class="qmark">
              <img src="<?php $fp_theme->images_path() ?>/icons/icon-qmark.svg" alt="Interested in leasing or asset sales?" />
            </div>
            <p class="tooltip">
              <?php echo get_option('header_tooltip_text') ?>
            </p>
          </a>
          <!--
          <?php echo wp_logout_url( site_url() ); ?>
        -->
          <a class="btn staff-login-btn" target="_blank" href="http://staff.fourpointenergy.com" onclick="dataLayer.push({event:'text link',headline:'Header',label:'Staff Login'});">Staff Login</a>
        </div>
        <div id="mobile_menu" class="mobile_nav_icon">MENU&nbsp;<span class="fa fa-bars fa-2"></span></div>
        <div class="mobile-search-icon" id="js-mobile-search-icon"><span class="fa fa-search search-icon">search</span></div>
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
