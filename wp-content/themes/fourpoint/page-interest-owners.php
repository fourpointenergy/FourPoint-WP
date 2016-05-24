<?php
/**
 * Template for displaying all pages
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <?php the_content(); ?>
      <div class="opp-contact">
        <iframe frameborder="0" seamless src="https://www.energylink.com/LoginFrame?Region=Us&OpBaId=446786" height="425px" width="350px"></iframe>
      </div>
      <div class="opp-contact">
        <aside class="card">
          <div class="card-bottom">
            <div class="inner">
              <h3>PDS Login</h3>
              <p></p>
              <a href="https://secure.pds-austin.com/fourpoint/login.asp" class="button btn-blue" target="_blank">Click Here</a>
            </div>
          </div>
        </aside>
      </div>
  	</div>
  	</div>
  </div>
<?php endwhile;// end of the loop. ?>
<style>
/* Interest Owner Login Code */
.login-options {
  /*overflow:auto;*/
  margin-top: 80px;
}
.login-options .pds-login {
  overflow:auto;
  border-right:1px solid #000;
  text-align:center;
  padding-top:90px;
  padding-bottom:120px;
}
.login-options .pds-login a.button {
  display:inline-block;
  margin:auto;
  color:#fff;
  margin-top: 20px;
}
.login-options .energy-link-login {
  float:right;
  margin-left:2%;
  width:350px;
}
.pds-login-inner {
  display:inline-block;
  padding:20px 120px;
  background-color: #ecece8;
}

</style>
<?php get_footer(); ?>
