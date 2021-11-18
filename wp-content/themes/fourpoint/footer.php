<?php
global $fp_theme;
global $current_user;
wp_get_current_user();
/**
 * Template for displaying the footer
 */?>
  <section class="cookie-warning">
    <p>We use cookies to offer you a better browsing experience and analyze site traffic. Read how we use cookies and how you can control them in our <a href="/cookie-policy">Cookie Statement</a>. By continuing to use our site or by closing this box, you affirmatively consent to our use of cookies.</p>
    <p>If you wish to change your settings for our website or withdraw consent, please read our <a href="/cookie-policy">Cookie Statement</a> to learn more.</p>
    <button class="cookie-accept">accept</button>
  </section>
  <footer>
    <section>
      <div class="legal">
        <ul>
          <?php
            $navitems = wp_get_nav_menu_items('footer-nav');
            foreach($navitems as $navitem): ?>
            <li><a class="animsition-link" href="<?php echo $navitem->url ?>"<?php if($navitem->target != '') echo ' target="'.$navitem->target.'"' ?> onclick="dataLayer.push({event:'text link',headline:'footer',label:'<?php echo $navitem->title ?>'});"><?php echo $navitem->title ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <a href="/" class="footer_icon animsition-link" onclick="dataLayer.push({event:'button click',headline:'footer',label:'logo'});">
        <img src="<?php $fp_theme->images_path() ?>/logo_icon.svg" alt="FourPoint Energy" />
        <!-- <p>&copy; FourPoint Energy</p> -->
      </a>
      <div class="social">

        <ul>
          <!-- <li class="no_icon">Connect</li> -->
          <li><a href="<?php echo get_option('linkedin_link') ?>" aria-hidden="true" target="_blank" class="social-link"  onclick="dataLayer.push({event:'social link',headline:'footer',label:'Linkedin'});">
            <img src="<?php $fp_theme->images_path() ?>/linkedin-logo.svg" alt="LinkedIn" style="max-width:16px;" />
          </a></li>
        </ul>
        <p class="e-contact"><?php echo get_option('footer_copyright') ?></p>
        <!-- <p class="e-contact">Emergency Contact: <a href="tel:<?php echo get_option('emergency_contact_phone') ?>"><?php echo get_option('emergency_contact_phone') ?></a></p> -->
      </div>
    </section>
  </footer>
  <div hidden><?php include_once get_template_directory().'/assets/images/symbol-defs.svg'; ?></div>
  <?php wp_footer(); ?>
  </div>
</body>
</html>
