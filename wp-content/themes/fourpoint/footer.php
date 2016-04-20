<?php
global $theme;
global $current_user;
get_currentuserinfo();
/**
 * Template for displaying the footer
 */?>
 <div id="login-modal">
	 <aside class="card login-card">
		 <a href="#" class="close-modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg></a>
		 <div class="card-bottom">
			 <div class="inner">
				 <p>Login copy goes here Login copy goes here Login copy goes here Login copy goes here </p>
				 <div class="form_wrap login-form">
					 <form id="login" name="login" class="general-form" accept-charset="utf-8">
						 <div>
							 <label class="desc" id="name" for="Field1">Username</label>
							 <input name="name" type="text" placeholder="Username"/>
						 </div>

						 <div>
							 <label class="desc" id="email" for="Field1">Password</label>
							 <input name="name" type="text" placeholder="Password"/>
						 </div>
						 <div class="error-msg">
							 <label id="form-error-msg">There was a problem with your submission.</label>
						 </div>
						 <div class="forgot-pw">
							 <a href="#">Forgot Password?</a>
						 </div>
						 <button type="button" value="submit" class="button btn-blue">Login</button>
					 </form>
				 </div>
			 </div>
		 </div>
	 </aside>
 </div>
 <footer>
	 <section>
		 <div class="legal">
			 <!-- <ul>
				 <li><a href="#">Privacy Policy</a></li>
				 <li><a href="#">Terms &amp; Conditions</a></li>
				 <li><a href="#">Staff Login</a></li>
			 </ul> -->

       <?php
       $navitems = wp_get_nav_menu_items('footer-nav');
       if(count($navitems > 0)) { ?>
         <ul>
        <?php foreach($navitems as $navitem) { ?>
          <li><a href="<?php $navitem->url ?>"<?php if($navitem->target != '') echo(' target="'.$navitem->target.'"') ?>><?php echo $navitem->title ?></a></li>
        <?php } ?>
        </ul>
      <?php } ?>
		 </div>
		 <a href="#" class="footer_icon">
			 <img src="<?php $theme->images_path() ?>/logo_icon.svg" />
			 <!-- <p>&copy; FourPoint Energy</p> -->
		 </a>
		 <div class="social">

			 <ul>
				 <!-- <li class="no_icon">Connect</li> -->
				 <li><a href="<?php echo get_option('linkedin_link') ?>" aria-hidden="true" data-icon="I" target="_blank"></a></li>
			 </ul>
       <p class="e-contact"><?php echo get_option('footer_copyright') ?></p>
			 <!-- <p class="e-contact">Emergency Contact: <a href="tel:<?php echo get_option('emergency_contact_phone') ?>"><?php echo get_option('emergency_contact_phone') ?></a></p> -->
		 </div>
	 </section>
 </footer>
 <?php wp_footer(); ?>
</body>
</html>
