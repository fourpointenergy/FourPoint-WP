<!-- Staff Portal Home Page -->

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
  <nav class="sp-nav">
    <section>
      <a class="logo" href="/">
        <img src="<?php $theme->images_path() ?>/FourPoint_Logo.svg" alt="FourPoint Energy Logo">
      </a>
      <div class="nav_wrap">
        
      </div>
    </section>
  </nav>
  <div class="sp-subnav">
    <ul class="container">
      <li><a href="#" class="btn-blue btn-wide button"><span class="sp-icon">%</span>Benefits</a></li>
      <li><a href="#" class="btn-blue btn-wide button"><span class="sp-icon">%</span>Documents &amp; Forms</a></li>
      <li><a href="#" class="btn-blue btn-wide button"><span class="sp-icon">%</span>Brand Center</a></li>
    </ul>
  </div>

  <!-- section w/bg image, search, quick links box -->
  <section class="hero-main">
    <div class="container">
      <div class="search-left">
        <h1>Fourpoint energy employee resource center</h1>
        <p>Search for a document or resource</p>
        <form>SEARCH BOX GOES HERE</form>
      </div>
      <div class="quick-links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#">Fidelity Time</a></li>
          <li><a href="#">Fidelity Time</a></li>
          <li><a href="#">Fidelity Time</a></li>
          <li><a href="#">Fidelity Time</a></li>
          <li><a href="#">Fidelity Time</a></li>
          <li><a href="#">Fidelity Time</a></li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Holiday schedule -->
  <section class="holiday-schedule">
    <div class="holiday-wrapper">
      <h3>Fourpoint Holiday Schedule</h3>
      <a href="#">View Holiday Schedule</a>
      
      <div class="holiday-container">
        <div class="holiday">
          <img src="/wp-content/themes/fourpoint/assets/images/icons/icon-qmark.svg" class="sp-cal-icon" />
          <h4>Labor Day</h4>
          <div class="date">
            <p><span>Monday</span>September 5, 2016</p>
          </div>
        </div>

        <div class="holiday">
          <img src="/wp-content/themes/fourpoint/assets/images/icons/icon-qmark.svg" class="sp-cal-icon" />
          <h4>Labor Day</h4>
          <div class="date">
            <p><span>Monday</span>September 5, 2016</p>
          </div>
        </div>

        <div class="holiday">
          <img src="/wp-content/themes/fourpoint/assets/images/icons/icon-qmark.svg" class="sp-cal-icon" />
          <h4>Labor Day</h4>
          <div class="date">
            <p><span>Monday</span>September 5, 2016</p>
          </div>
        </div>

        <div class="holiday">
          <img src="/wp-content/themes/fourpoint/assets/images/icons/icon-qmark.svg" class="sp-cal-icon" />
          <h4>Labor Day</h4>
          <div class="date">
            <p><span>Monday</span>September 5, 2016</p>
          </div>
        </div>

        <div class="holiday">
          <img src="/wp-content/themes/fourpoint/assets/images/icons/icon-qmark.svg" class="sp-cal-icon" />
          <h4>Labor Day</h4>
          <div class="date">
            <p><span>Monday</span>September 5, 2016</p>
          </div>
        </div>

        <div class="holiday">
          <img src="/wp-content/themes/fourpoint/assets/images/icons/icon-qmark.svg" class="sp-cal-icon" />
          <h4>Labor Day</h4>
          <div class="date">
            <p><span>Monday</span>September 5, 2016</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <?php
  // global $theme;
  // global $current_user;
  // get_currentuserinfo();
  /**
   * Template for displaying the footer
   */?>
   <footer class="sp-footer">
    <div class="container">
      <div class="link-container">
        <h4>Benefits</h4>
        <ul>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
        </ul>
      </div>

      <div class="link-container">
        <h4>Benefits</h4>
        <ul>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
        </ul>
      </div>

      <div class="link-container">
        <h4>Benefits</h4>
        <ul>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
        </ul>
      </div>

      <div class="link-container">
        <h4>Benefits</h4>
        <ul>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
          <li><a href="#">Open Enrollment</a></li>
        </ul>
      </div>
    </div>
   </footer>
   <?php wp_footer(); ?>
  </body>
</html>




