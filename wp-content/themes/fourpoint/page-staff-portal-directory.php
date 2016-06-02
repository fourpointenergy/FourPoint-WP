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
        <h1>Fourpoint energy IT help center</h1>
        <h3>Search for a document or resource</h3>
        <form>SEARCH BOX GOES HERE</form>
      </div>
      <div class="quick-links shadow-border">
        <h3 class="blue-caps-headline">Quick Links</h3>
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

  <div class="it-doc-container">
    <div class="container">
      <div class="copy_split">
        
        <div class="side-content">
          <aside><p>February 24, 2016</p></aside>
          <article>
            <p>FourPoint to Acquire Chesapeake Energy’s Remaining Western Anadarko Assets</p>
            <a href="http://23.253.56.162/wp-content/uploads/2016/05/Chesapeake-Energy-Aquisition-Press-Release_FINAL.pdf" target="_blank">Read More</a>
          </article>
        </div>

        <div class="side-content">
          <aside><p>February 24, 2016</p></aside>
          <article>
            <p>FourPoint to Acquire Chesapeake Energy’s Remaining Western Anadarko Assets</p>
            <a href="http://23.253.56.162/wp-content/uploads/2016/05/Chesapeake-Energy-Aquisition-Press-Release_FINAL.pdf" target="_blank">Read More</a>
          </article>
        </div>

        <div class="side-content">
          <aside><p>February 24, 2016</p></aside>
          <article>
            <p>FourPoint to Acquire Chesapeake Energy’s Remaining Western Anadarko Assets</p>
            <a href="http://23.253.56.162/wp-content/uploads/2016/05/Chesapeake-Energy-Aquisition-Press-Release_FINAL.pdf" target="_blank">Read More</a>
          </article>
        </div>

        <div class="side-content">
          <aside><p>February 24, 2016</p></aside>
          <article>
            <p>FourPoint to Acquire Chesapeake Energy’s Remaining Western Anadarko Assets</p>
            <a href="http://23.253.56.162/wp-content/uploads/2016/05/Chesapeake-Energy-Aquisition-Press-Release_FINAL.pdf" target="_blank">Read More</a>
          </article>
        </div>
            
      </div>
    </div>
  </div>


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




