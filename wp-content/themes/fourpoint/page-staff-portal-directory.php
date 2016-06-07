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
        <h1>Fourpoint energy company directory</h1>
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

  <div class="address-container">
    <div class="container">
      <p>Lorem ipsum Aliqua ut laboris sit voluptate tempor deserunt. Lorem ipsum Aliqua ut laboris sit voluptate tempor deserunt.</p>
      <div class="address">
        <p>100 St. Paul Street, Ste. 400 Denver, CO 80206</p>
        <a href="tel:3033033030">303.300.3030</a>
        <a href="#">Denver Organizational Chart</a>
      </div>

      <div class="address">
        <p>100 St. Paul Street, Ste. 400 Denver, CO 80206</p>
        <a href="tel:3033033030">303.300.3030</a>
        <a href="#">Denver Organizational Chart</a>
      </div>

      <div class="address">
        <p>100 St. Paul Street, Ste. 400 Denver, CO 80206</p>
        <a href="tel:3033033030">303.300.3030</a>
        <a href="#">Denver Organizational Chart</a>
      </div>

      <div class="address">
        <p>100 St. Paul Street, Ste. 400 Denver, CO 80206</p>
        <a href="tel:3033033030">303.300.3030</a>
        <a href="#">Denver Organizational Chart</a>
      </div>

      <div class="address">
        <p>100 St. Paul Street, Ste. 400 Denver, CO 80206</p>
        <a href="tel:3033033030">303.300.3030</a>
        <a href="#">Denver Organizational Chart</a>
      </div>
    </div>
  </div>

  <div class="employees-wrapper">
    <div class="container">
      <div class="office-sort">
        <h3>Choose Office:</h3>
        <ul>
          <li><a href="#" class="button btn-white active" data-office="all">All</a></li>
          <li><a href="#" class="button btn-white" data-office="borger">Borger</a></li>
          <li><a href="#" class="button btn-white" data-office="denver">Denver</a></li>
          <li><a href="#" class="button btn-white" data-office="elk-city">Elk City</a></li>
          <li><a href="#" class="button btn-white" data-office="shamrock">Shamrock</a></li>
          <li><a href="#" class="button btn-white" data-office="woodward">Woodward</a></li>
        </ul>
      </div>
      <div class="name-sort">
        <h3>Filter by Last Name:</h3>
        <ul>
          <li><a href="#" class="button btn-white active" data-office="all">All</a></li>
          <li><a href="#" class="button btn-white" data-office="a-f">A-F</a></li>
          <li><a href="#" class="button btn-white" data-office="g-m">G-M</a></li>
          <li><a href="#" class="button btn-white" data-office="n-s">N-S</a></li>
          <li><a href="#" class="button btn-white" data-office="t-z">T-Z</a></li>
        </ul>
      </div>
      

      <ul>
        <li class="employee-bio-container">
          <div class="employee-bio">
            
            <div class="front">
              <img src="/wp-content/themes/fourpoint/assets/images/frenchy.jpg">
              <h2>Dwight Schrute</h2>
              <h3>Assistant to the Assistant</h3>
              <p class="office">Shammrock</p>
              <ul class="contact-info">
                <li>Email: <span>d.schrute@fourpointenergy.com</span></li>
                <li>Outside Dial: <span>303.303.3030</span></li>
                <li>Ext: <span>99</span></li>
                <li>Mobile: <span>303.303.3030</span></li>
                <li>Mobile: <span>303.303.3030</span></li>
              </ul>
              <p href="#">More</p>      
            </div>
            
            <div class="back">
              <img src="/wp-content/themes/fourpoint/assets/images/frenchy.jpg">
              <div class="inner">
                <p><span>Shammrock</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
              </div>
              <p href="#">Less</p> 
            </div>
          
          </div>
        </li>
        <li class="employee-bio-container">
          <div class="employee-bio">
            
            <div class="front">
            <p>FRONT</p>
              <!-- <img src="/wp-content/themes/fourpoint/assets/images/frenchy.jpg">         -->
            </div>
            
            <div class="back">
              <p>BACK</p>
            </div>
          
          </div>
        </li>
        <li class="employee-bio-container">
          <div class="employee-bio">
            
            <div class="front">
            <p>FRONT</p>
              <!-- <img src="/wp-content/themes/fourpoint/assets/images/frenchy.jpg">         -->
            </div>
            
            <div class="back">
              <p>BACK</p>
            </div>
          
          </div>
        </li>
        <li class="employee-bio-container">
          <div class="employee-bio">
            
            <div class="front">
            <p>FRONT</p>
              <!-- <img src="/wp-content/themes/fourpoint/assets/images/frenchy.jpg">         -->
            </div>
            
            <div class="back">
              <p>BACK</p>
            </div>
          
          </div>
        </li> 

      </ul>


    </div>
  </div>



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

   <script type="text/javascript" src="/wp-content/themes/fourpoint/assets/javascripts/staff-portal.js"></script>

  </body>
</html>




