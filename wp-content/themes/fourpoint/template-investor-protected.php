<?php
/**
 * Template Name: Investor Protected
 */
global $theme;
wp_get_current_user();
get_header();
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <?php if(array_key_exists('investor',$current_user->allcaps) && $current_user->allcaps['investor']) { ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>

  <div class="container general-content">
  	<div class="wrapper">
      <?php the_content(); ?>

  	</div>
  </div>
<?php
} else { ?>
  <div class="container general-content">
  	<div class="wrapper">
  <?php the_field('not_logged_in_content'); ?>
      <div class="login-modal investors-login open">
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
    </div>
  </div>
<?php }
endwhile ?>
<?php get_footer(); ?>
