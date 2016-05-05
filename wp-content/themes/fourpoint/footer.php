<?php
global $theme;
global $current_user;
get_currentuserinfo();
/**
 * Template for displaying the footer
 */?>

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
        <?php foreach($navitems as $navitem) {
           ?>
          <li><a href="<?php echo $navitem->url ?>"<?php if($navitem->target != '') echo(' target="'.$navitem->target.'"') ?>><?php echo $navitem->title ?></a></li>
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
