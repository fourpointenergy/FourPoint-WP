<?php
/**
 * Template for displaying the login page
 */
global $fp_theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header id="main-content">
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>
  <div class="container">
  	<div class="row">
  		<aside class="card login-card">
  			<img src="<?php $fp_theme->images_path() ?>/tree-test2.jpg" />
  			<div class="card-bottom">
  				<div class="inner">
            <h2>Investors</h2>
            <?php the_field('investors_login_content'); ?>

  					<button type="button" class="button btn-blue open-login" rel="investors-login">Login</button>
  				</div>
  			</div>
  		</aside>

  		<aside class="card login-card">
  			<img src="<?php $fp_theme->images_path() ?>/tree-test2.jpg" />
  			<div class="card-bottom">
  				<div class="inner">
            <h2>Interest Owners</h2>
            <?php the_field('interest_owners_login_content'); ?>
  					<button type="button" class="button btn-blue open-login" rel="interest-owners-login">Login</button>
  				</div>
  			</div>
  		</aside>

  		<aside class="card login-card">
  			<img src="<?php $fp_theme->images_path() ?>/tree-test2.jpg" />
  			<div class="card-bottom">
  				<div class="inner">
            <h2>FourPoint Staff</h2>
            <?php the_field('staff_login_content'); ?>
  					<button type="button" class="button btn-blue">Login</button>
  				</div>
  			</div>
  		</aside>
  	</div>
  </div>
<!-- Investors Login Modal -->
<?php
  $failed_investors_login = false;
  $failed_interest_owners_login = false;
  $failed_staff_login = false;
  if(array_key_exists('login',$_REQUEST) && $_REQUEST['login']=='failed' && array_key_exists('login_type',$_REQUEST)) {
    if($_REQUEST['login_type']=='investors') {
      $failed_investors_login = true;
    }
    if($_REQUEST['login_type']=='interest_owners') {
      $failed_interest_owners_login = true;
    }
    if($_REQUEST['login_type']=='staff') {
      $failed_staff_login = true;
    }
  }
?>
<div class="login-modal investors-login<?php if($failed_investors_login) echo(' open') ?>">
  <aside class="card login-card">
    <a href="#" class="close-modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg></a>
    <div class="card-bottom">
      <div class="inner">
        <p><?php the_field('login_popup_content') ?></p>
        <?php if($failed_investors_login) { ?>
          <p class="login-error"><?php the_field('login_failed_error_message') ?></p>
        <?php } ?>
        <div class="form_wrap login-form">
         <div class="general-form">
         <?php
            //wp_login_form( $args );
          ?>
         <form name="loginform" class="loginform" action="<?php echo site_url('/wp-login.php') ?>" method="post">
           <p class="login-username">
             <label for="user_login">Username</label>
             <input type="text" name="log" id="user_login" class="input" value="" size="20">
           </p>
           <p class="login-password">
             <label for="user_pass">Password</label>
             <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
           </p>
           <!-- <p><a href="/wp-login.php?action=lostpassword">Forgot Password?</a></p> -->
           <p class="login-submit">
             <input type="submit" name="wp-submit" id="wp-submit" class="button btn-blue button-primary" value="Log In">
             <input type="hidden" name="redirect_to" value="<?php echo site_url('/investors') ?>">
             <input type="hidden" name="login_type" value="investors">
           </p>
         </form>
       </div>
        </div>
      </div>
    </div>
  </aside>
</div>
<!-- Interest Owners Login Modal -->
<div class="login-modal interest-owners-login<?php if($failed_interest_owners_login) echo(' open') ?>">
  <aside class="card login-card">
    <a href="#" class="close-modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg></a>
    <div class="card-bottom">
      <div class="inner">
        <p><?php the_field('login_popup_content') ?></p>
        <?php if($failed_interest_owners_login) { ?>
          <p class="login-error"><?php the_field('login_failed_error_message') ?></p>
        <?php } ?>
        <div class="form_wrap login-form">
         <div class="general-form">
         <form name="loginform" class="loginform" action="<?php echo site_url('/wp-login.php') ?>" method="post">
           <p class="login-username">
             <label for="user_login">Username</label>
             <input type="text" name="log" id="user_login" class="input" value="" size="20">
           </p>
           <p class="login-password">
             <label for="user_pass">Password</label>
             <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
           </p>
           <!-- <p><a href="/wp-login.php?action=lostpassword">Forgot Password?</a></p> -->
           <p class="login-submit">
             <input type="submit" name="wp-submit" id="wp-submit" class="button-primary button btn-blue" value="Log In">
             <input type="hidden" name="redirect_to" value="<?php echo site_url('/interest-owners') ?>">
             <input type="hidden" name="login_type" value="interest_owners">
           </p>
         </form>
       </div>
        </div>
      </div>
    </div>
  </aside>
</div>
<!-- Staff Login Modal -->
<div class="login-modal staff-login<?php if($failed_staff_login) echo(' open') ?>">
  <aside class="card login-card">
    <a href="#" class="close-modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg></a>
    <div class="card-bottom">
      <div class="inner">
        <p><?php the_field('login_popup_content') ?></p>
        <?php if($failed_staff_login) { ?>
          <p class="login-error"><?php the_field('login_failed_error_message') ?></p>
        <?php } ?>
        <div class="form_wrap login-form">
         <div class="general-form">
         <form name="loginform" class="loginform" action="<?php echo site_url('/wp-login.php') ?>" method="post">
           <p class="login-username">
             <label for="user_login">Username</label>
             <input type="text" name="log" id="user_login" class="input" value="" size="20">
           </p>
           <p class="login-password">
             <label for="user_pass">Password</label>
             <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
           </p>
           <!-- <p><a href="/wp-login.php?action=lostpassword">Forgot Password?</a></p> -->
           <p class="login-submit">
             <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Log In">
             <input type="hidden" name="redirect_to" value="<?php echo site_url('/staff') ?>">
             <input type="hidden" name="login_type" value="staff">
           </p>
         </form>
       </div>
        </div>
      </div>
    </div>
  </aside>
</div>
<?php endwhile;// end of the loop. ?>
<?php get_footer(); ?>
