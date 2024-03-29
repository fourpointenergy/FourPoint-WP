<?php
/**
 * Main class for the WordPress Theme
 */
class Fourpoint {

  /**
   * Name of the directory where the theme files resides
   * @var string
   * @since 1.0
   */
  private $theme_name = "Fourpoint";
  private $scripts_version = '0.02';

  function __construct() {
    add_action('init', array($this, 'register_assets'));
    add_action('init', array($this, 'init_assets'));
    add_action('init', array($this, 'init_custom_post_types'));
    add_action('init', array($this, 'init_custom_taxonomies'));
    add_action('init', array($this, 'init_custom_user_roles'));
    add_action('admin_init', array($this, 'restrict_dashboard'));
    add_action('login_form_middle', array($this, 'add_lost_password_link'));
    add_filter('admin_init', array($this, 'register_fields'));
    add_action('wp_login_failed', array($this, 'front_end_login_fail'));
    add_filter('login_redirect', array($this, 'my_login_redirect'), 10, 3 );

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(596, 442, false);
    add_image_size('Slider Photo',1290, 840, false);
    add_image_size('Mobile Slider Photo',800, 600, false);
    add_image_size('Timeline Photo',565, 410, false);
    add_image_size('Affiliation Logo',160, 160, false);
    add_image_size('Management Thumbnail',340, 340, false);
    add_image_size('Management Photo',900, 540, false);
    add_image_size('Post Thumbnail',522, 348, false);

    // enables wigitized sidebars
    register_sidebars();

    add_filter('mce_buttons_2', 'my_mce_buttons_2');

    add_action( 'gform_user_registered', array($this, 'pi_gravity_registration_autologin'));
    add_filter('excerpt_more', array($this, 'new_excerpt_more'));
    add_filter( 'excerpt_length', array($this, 'custom_excerpt_length'), 999 );

    // custom menu support
    add_theme_support('nav-menus');
    if (function_exists('register_nav_menus')) {
      register_nav_menus(
        array(
          'main-menu' => 'Main Menu',
          'secondary-menu' => 'Secondary Menu',
          'footer-menu' => 'Footer Menu'
        )
      );
    }

    /**
     * Customizations and initializations for ACF.
     */
    require get_template_directory() . '/inc/acf-setup.php';
  }

  function restrict_dashboard() {
    // die("restrict dashboard");
    if ( ! defined( 'DOING_AJAX' ) && ! current_user_can( 'manage_options' ) ) {
      wp_redirect( "/" ); //add this url here to where someone logged in on the front end
    }
  }

  function add_lost_password_link() {
    return '<p><a href="/wp-login.php?action=lostpassword">Lost Password?</a></p>';
  }

  function front_end_login_fail( $username, $password_empty = 'false', $username_empty = 'false' ) {
     $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
     $login_type = $_REQUEST['login_type'];

     // if there's a valid referrer, and it's not the default log-in screen
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {

      $pos = strpos($referrer, '?login=failed');
      if($pos === false) {
         // add the failed
         // wp_redirect( $referrer . '?login=failed&pwblank='.$password_empty.'&ublank='.$username_empty );  // let's append some information (login=failed) to the URL for the theme to use
         wp_redirect( $referrer . '?login=failed&login_type='.$login_type);  // let's append some information (login=failed) to the URL for the theme to use
      }
      else {
        // already has the failed don't appened it again
        // wp_redirect( $referrer . '&pwblank='.$password_empty.'&ublank='.$username_empty );  // already appeneded redirect back
        wp_redirect( $referrer );  // already appeneded redirect back
      }

        exit;
     }
  }

  //This forces the login fail function if the username or password is empty
  function check_login_field_empty( $user, $username, $password ) {
      if ( empty( $username ) || empty( $password ) ) {
        $username_empty = empty( $username );
        $password_empty = empty( $password );
          do_action( 'wp_login_failed', $user, $password_empty, $username_empty );
      }
      return $user;
  }

  /**
   * Redirect user after successful login.
   *
   * @param string $redirect_to URL to redirect to.
   * @param string $request URL the user is coming from.
   * @param object $user Logged user's data.
   * @return string
   */
  function my_login_redirect( $redirect_to, $request, $user ) {
      //is there a user to check?
      if ( isset( $user->roles ) && is_array( $user->roles ) ) {
          //check for admins
          if ( in_array( 'administrator', $user->roles ) ) {
              // redirect them to the default place
              return admin_url();
          } else {
              return home_url('/investors/');
          }
      } else {
          return home_url();
      }
  }

  function register_assets() {
    if (!is_admin() & !is_login_page()) {

      // wp_register_script('modernizr', get_bloginfo("stylesheet_directory") . "/assets/javascripts/modernizr.js", false);
      // wp_register_script('fontawesome', "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css", false);
      // wp_register_script('libs', get_bloginfo('stylesheet_directory') . '/assets/javascripts/libs.js', array('jquery'), $this->scripts_version, true);
      // wp_register_script($this->theme_name . '-site', get_bloginfo('stylesheet_directory') . '/assets/javascripts/main.js', array('jquery', 'libs'), $this->scripts_version, true);
    }
  }

  function images_path() {
    echo get_bloginfo('template_url') . '/assets/images';
  }

  function register_nav_menus() {
    // custom menu support
    add_theme_support('menus');
    if (function_exists('register_nav_menus')) {
      register_nav_menus(
        array(
          'main-menu' => 'Main Menu',
        )
      );
    }
  }

  function register_sidebars() {
    if (function_exists('register_sidebar')) {
      // Sidebar Widget
      // Location: the sidebar
      // register_sidebar(array('name' => __('Primary'),
      //   'id' => 'article-sidebar',
      //   'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
      //   'after_widget' => '</ul></div>',
      //   'before_title' => '<h3>',
      //   'after_title' => '</h3>',
      // ));
      //
      // register_sidebar(array('name' => __('Secondary'),
      //   'id' => 'article-sidebar2',
      //   'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
      //   'after_widget' => '</ul></div>',
      //   'before_title' => '<h3>',
      //   'after_title' => '</h3>',
      // ));
    }
  }

  /**
   * Enqueues scripts and styles for this theme.
   * This function will be run on initialization.
   * @return void
   * @since 1.0
   */
  function init_assets() {
    if (!is_admin() & !is_login_page()) {

      // STYLES
      wp_enqueue_style($this->theme_name . '-styles', get_bloginfo('stylesheet_directory') . '/assets/build/css/style10.css', false, $this->scripts_version, 'all');
      wp_enqueue_style('lib-styles', get_bloginfo('stylesheet_directory') . '/assets/stylesheets/libs.css', false, $this->scripts_version, 'all');
      wp_enqueue_style('fancybox', get_bloginfo('stylesheet_directory') . '/assets/fancybox/source/jquery.fancybox.css', false, $this->scripts_version, 'all');
      wp_enqueue_style('fonts', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false, '1.0', 'all');

      // SCRIPTS
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', false, null, true);

      wp_enqueue_script('modernizr', get_bloginfo("stylesheet_directory") . "/assets/javascripts/modernizr.js", false);
      wp_enqueue_script('jquery');
      wp_enqueue_script('libs', get_bloginfo('stylesheet_directory') . '/assets/build/js/libs.js', array('jquery'), $this->scripts_version, true);
      wp_enqueue_script($this->theme_name . '-site', get_bloginfo('stylesheet_directory') . '/assets/build/js/main.js', array('jquery', 'libs'), $this->scripts_version, true);
      wp_enqueue_script('fancybox', get_bloginfo('stylesheet_directory') . '/assets/fancybox/source/jquery.fancybox.pack.js', array('jquery'), $this->scripts_version, true);
      // wp_enqueue_script($this->theme_name . '-gtm', get_bloginfo('stylesheet_directory') . '/assets/build/js/gtm.js', array('jquery'), $this->scripts_version, false);
    }
  }

  /**
   * Initialize custom post types.
   */
  function init_custom_post_types() {
    // Board of Directors
    $labels = array(
      'name' => 'Profile',
      'singular_name' => 'Profile',
      'add_new' => 'Add New Profile',
      'add_new_item' => 'Add Profile',
      'edit_item' => 'Edit Profile',
      'new_item' => 'New Profile',
      'all_items' => 'All Profiles',
      'view_item' => 'View Profiles',
      'search_items' => 'Search Profiles',
      'not_found' =>  'No profiles found',
      'not_found_in_trash' => 'No profiles found in Trash',
      'menu_name' => 'Board of Directors'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'board-of-managers'),
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 3,
      'supports' => array('title','editor','author')
    );
    register_post_type('board-of-managers', $args);

    // Management Team
    $labels = array(
      'name' => 'Profile',
      'singular_name' => 'Profile',
      'add_new' => 'Add New Profile',
      'add_new_item' => 'Add Profile',
      'edit_item' => 'Edit Profile',
      'new_item' => 'New Profile',
      'all_items' => 'All Profiles',
      'view_item' => 'View Profiles',
      'search_items' => 'Search Profiles',
      'not_found' =>  'No profiles found',
      'not_found_in_trash' => 'No profiles found in Trash',
      'menu_name' => 'Management Team'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'management-team'),
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 3,
      'supports' => array('title','editor','author')
    );
    register_post_type('management-team', $args);

    //FAQs
    // $labels = array(
    //   'name' => 'FAQ',
    //   'singular_name' => 'FAQ',
    //   'add_new' => 'Add New FAQ',
    //   'add_new_item' => 'Add FAQ',
    //   'edit_item' => 'Edit FAQ',
    //   'new_item' => 'New FAQ',
    //   'all_items' => 'All FAQs',
    //   'view_item' => 'View FAQs',
    //   'search_items' => 'Search FAQs',
    //   'not_found' =>  'No faqs found',
    //   'not_found_in_trash' => 'No faqs found in Trash',
    //   'menu_name' => 'FAQs'
    // );
    // $args = array(
    //   'labels' => $labels,
    //   'public' => true,
    //   'publicly_queryable' => true,
    //   'show_ui' => true,
    //   'show_in_menu' => true,
    //   'query_var' => true,
    //   'rewrite' => array( 'slug' => 'faqs'),
    //   'capability_type' => 'post',
    //   'has_archive' => false,
    //   'hierarchical' => false,
    //   'menu_position' => 3,
    //   'supports' => array('title','editor')
    // );
    // register_post_type('faq', $args);

    //Press Releases
    $labels = array(
      'name' => 'Press Release',
      'singular_name' => 'Press Release',
      'add_new' => 'Add New Press Release',
      'add_new_item' => 'Add Press Release',
      'edit_item' => 'Edit Press Release',
      'new_item' => 'New Press Release',
      'all_items' => 'All Press Releases',
      'view_item' => 'View Press Releases',
      'search_items' => 'Search Press Releases',
      'not_found' =>  'No press releases found',
      'not_found_in_trash' => 'No press releases found in Trash',
      'menu_name' => 'Press Releases'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'press-releases'),
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 3,
    );
    register_post_type('press-release', $args);

    //Fourpoint Features
    $labels = array(
      'name' => 'Feature',
      'singular_name' => 'Feature',
      'add_new' => 'Add New Feature',
      'add_new_item' => 'Add Feature',
      'edit_item' => 'Edit Feature',
      'new_item' => 'New Feature',
      'all_items' => 'All Feature',
      'view_item' => 'View Feature',
      'search_items' => 'Search Features',
      'not_found' =>  'No features found',
      'not_found_in_trash' => 'No features found in Trash',
      'menu_name' => 'Features'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'fourpoint-features'),
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 3,
    );
    register_post_type('fourpoint-feature', $args);

    //Company Updates
    // $labels = array(
    //   'name' => 'Company Update',
    //   'singular_name' => 'Company Update',
    //   'add_new' => 'Add New Company Update',
    //   'add_new_item' => 'Add Company Update',
    //   'edit_item' => 'Edit Company Update',
    //   'new_item' => 'New Company Update',
    //   'all_items' => 'All Company Updates',
    //   'view_item' => 'View Company Updates',
    //   'search_items' => 'Search Company Updates',
    //   'not_found' =>  'No company updates found',
    //   'not_found_in_trash' => 'No company updates found in Trash',
    //   'menu_name' => 'Company Updates'
    // );
    // $args = array(
    //   'labels' => $labels,
    //   'public' => true,
    //   'publicly_queryable' => true,
    //   'show_ui' => true,
    //   'show_in_menu' => true,
    //   'query_var' => true,
    //   'rewrite' => array( 'slug' => 'company updates'),
    //   'capability_type' => 'post',
    //   'has_archive' => false,
    //   'hierarchical' => false,
    //   'menu_position' => 3,
    //   'supports' => array('title','editor')
    // );
    // register_post_type('company-update', $args);

    //Gallery Sets
    $labels = array(
      'name' => 'Gallery Set',
      'singular_name' => 'Gallery Set',
      'add_new' => 'Add New Gallery Set',
      'add_new_item' => 'Add Gallery Set',
      'edit_item' => 'Edit Gallery Set',
      'new_item' => 'New Gallery Set',
      'all_items' => 'All Gallery Sets',
      'view_item' => 'View Gallery Sets',
      'search_items' => 'Search Gallery Sets',
      'not_found' =>  'No gallery sets found',
      'not_found_in_trash' => 'No gallery sets found in Trash',
      'menu_name' => 'Gallery Sets'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'gallery-sets'),
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 3,
      'exclude_from_search' => true,
      'supports' => array('title','editor')
    );
    register_post_type('gallery-set', $args);
  }

  /**
   * Initialize custom taxonomies.
   */
  function init_custom_taxonomies() {

    /** Slide Types **/
    // $labels = array(
    // 'name' => __( 'Slide Types', 'slide_types' ),
    // 'singular_name' => __( 'Brand', 'slide_type' ),
    // 'search_items' =>  __( 'Search Slide Types' ),
    // 'all_items' => __( 'All Slide Types' ),
    // 'edit_item' => __( 'Edit Slide Types' ),
    // 'update_item' => __( 'Update Slide Type' ),
    // 'add_new_item' => __( 'Add New Slide Type' ),
    // 'new_item_name' => __( 'New Slide Type' ),
    // 'menu_name' => __( 'Slide Types' ),
    // );
    // $args = array(
    //   'hierarchical' => true,
    //   'labels' => $labels,
    //   'show_ui' => true,
    //   'show_admin_column' => true,
    //   'query_var' => true,
    //   'rewrite' => array('slug' => 'slide_type'),
    // );
    // register_taxonomy('slide_type', array('slides'), $args);
  }

  /**
  * Initialize custom roles
  **/
  function init_custom_user_roles() {
    $result = add_role(
        'investor',
        __( 'Investor' ),
        array(
          'administrator' => false,
            'read'         => true,  // true allows this capability
            'edit_posts'   => false,
            'delete_posts' => false, // Use false to explicitly deny
            'delete_others_posts' => false,
            'delete_others_pages' => false,
            'edit_others_posts' => false,
            'edit_others_pages' => false,
            'manage_categories' => false,
            'moderate_comments' => false,
            'publish_posts' => true,
            'publish_pages' => false,
            'upload_files' => true,
            'update_core' => false,
            'update_plugins' => false,
            'update_themes' => false,
            'install_plugins' => false,
            'install_themes' => false,
            'delete_themes' => false,
            'delete_plugins' => false,
            'edit_plugins' => false,
            'edit_themes' => false,
            'edit_files' => false,
            'edit_users' => false,
            'create_users' => false,
            'delete_users' => false,
            'activate_plugins' => false,
            'delete_pages' => false,
        )
    );

    $result = add_role(
        'interest-owner',
        __( 'Interest Owner' ),
        array(
          'administrator' => false,
            'read'         => true,  // true allows this capability
            'edit_posts'   => false,
            'delete_posts' => false, // Use false to explicitly deny
            'delete_others_posts' => false,
            'delete_others_pages' => false,
            'edit_others_posts' => false,
            'edit_others_pages' => false,
            'manage_categories' => false,
            'moderate_comments' => false,
            'publish_posts' => true,
            'publish_pages' => false,
            'upload_files' => true,
            'update_core' => false,
            'update_plugins' => false,
            'update_themes' => false,
            'install_plugins' => false,
            'install_themes' => false,
            'delete_themes' => false,
            'delete_plugins' => false,
            'edit_plugins' => false,
            'edit_themes' => false,
            'edit_files' => false,
            'edit_users' => false,
            'create_users' => false,
            'delete_users' => false,
            'activate_plugins' => false,
            'delete_pages' => false,
        )
    );

    $result = add_role(
        'staff',
        __( 'Staff' ),
        array(
          'administrator' => false,
            'read'         => true,  // true allows this capability
            'edit_posts'   => false,
            'delete_posts' => false, // Use false to explicitly deny
            'delete_others_posts' => false,
            'delete_others_pages' => false,
            'edit_others_posts' => false,
            'edit_others_pages' => false,
            'manage_categories' => false,
            'moderate_comments' => false,
            'publish_posts' => true,
            'publish_pages' => false,
            'upload_files' => true,
            'update_core' => false,
            'update_plugins' => false,
            'update_themes' => false,
            'install_plugins' => false,
            'install_themes' => false,
            'delete_themes' => false,
            'delete_plugins' => false,
            'edit_plugins' => false,
            'edit_themes' => false,
            'edit_files' => false,
            'edit_users' => false,
            'create_users' => false,
            'delete_users' => false,
            'activate_plugins' => false,
            'delete_pages' => false,
        )
    );
  }
  /**
   * Get attached image by post ID or image ID and echo an img tag with src, alt and class attributes.
   * @param number   $post_id   Post ID of the post the featured image is attached to.
   * @param number   $img_ID   Used when the image is not attached to a post, but the ID is known.
   * @param array   $classes   An array of classes to add to the image tag.
   * @param string   $size     Size of the image to grab. Defaults to 'full'.
   */
  function echo_attached_image($post_id = null, $img_ID = null, $classes = null, $size = 'full') {
    if ($img_ID === null) {
      $img_ID = get_post_thumbnail_id($post_id);
    }
    $img_src = wp_get_attachment_image_src($img_ID, $size);
    if ($img_src && $img_src != '') {
      $img_alt = get_post_meta($img_ID, '_wp_attachment_image_alt', true);
      $img_tag = '<img src="' . $img_src[0] . '" alt="' . $img_alt . '"';
      if ($classes) {
        $img_tag .= ' class="';
        foreach ($classes as $class) {
          $img_tag .= $class . ' ';
        }
        $img_tag .= '" ';
      }
      $img_tag .= '>';
      echo $img_tag;
    } else {
      echo '';
    }
  }

  function get_attached_image($post_id = null, $img_ID = null, $classes = null, $size = 'full') {
    if ($img_ID === null) {
      $img_ID = get_post_thumbnail_id($post_id);
    }
    $img_src = wp_get_attachment_image_src($img_ID, $size);
    if ($img_src && $img_src != '') {
      $img_alt = get_post_meta($img_ID, '_wp_attachment_image_alt', true);
      $img_tag = '<img src="' . $img_src[0] . '" alt="' . $img_alt . '"';
      if ($classes) {
        $img_tag .= ' class="';
        foreach ($classes as $class) {
          $img_tag .= $class . ' ';
        }
        $img_tag .= '" ';
      }
      $img_tag .= '>';
      return $img_tag;
    } else {
      return '';
    }
  }

  function has_attached_image($post_id = null, $img_ID = null) {
    if ($img_ID === null) {
      $img_ID = get_post_thumbnail_id($post_id);
    }
    $returnval = false;
    if($img_ID && $img_ID > 0) {
      $returnval = true;
    }
    return $returnval;
  }

  function get_attached_image_url($post_id = null, $img_ID = null, $classes = null, $size = 'full') {
    if ($img_ID === null) {
      $img_ID = get_post_thumbnail_id($post_id);
    }
    $img_src = wp_get_attachment_image_src($img_ID, $size);
    if ($img_src && $img_src != '') {
      return $img_src[0];
    } else {
      return '';
    }
  }

  function echo_attached_image_url($post_id = null, $img_ID = null, $classes = null, $size = 'full') {
    if ($img_ID === null) {
      $img_ID = get_post_thumbnail_id($post_id);
    }
    $img_src = wp_get_attachment_image_src($img_ID, $size);
    if ($img_src && $img_src != '') {
      echo $img_src[0];
    }
  }

  function echo_links_from_title($str) {
    $return_val = str_replace(" ", "-", strtolower($str));
    $return_val = str_replace('’', '', $return_val);
    echo ($return_val);
  }

  // Removes Trackbacks from the comment cout
  function comment_count($count) {
    if (!is_admin()) {
      global $id;
      $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
      return count($comments_by_type['comment']);
    } else {
      return $count;
    }
  }

  // custom excerpt ellipses for 2.9+
  function custom_excerpt_more($more) {
    return 'READ MORE &raquo;';
  }

  // no more jumping for read more link
  function no_more_jumping($post) {
    return '<a href="' . get_permalink($post->ID) . '" class="read-more">' . '&nbsp; Continue Reading &raquo;' . '</a>';
  }

  // category id in body and post class
  function category_id_class($classes) {
    global $post;
    foreach ((get_the_category($post->ID)) as $category) {
      $classes[] = 'cat-' . $category->cat_ID . '-id';
    }

    return $classes;
  }

  // adds a class to the post if there is a thumbnail
  function has_thumb_class($classes) {
    global $post;
    if (has_post_thumbnail($post->ID)) {$classes[] = 'has_thumb';}
    return $classes;
  }

  function security_measures() {
    // removes detailed login error information for security
    add_filter('login_errors', create_function('$a', "return null;"));
    // removes the WordPress version from your header for security
    add_filter('the_generator', create_function('$a', "return '';"));
  }

  function register_fields() {
    // register_setting( 'general', 'contact_address', 'esc_attr' );
    // register_setting('general', 'contact_address');
    // register_setting('general', 'emergency_contact_phone');
    register_setting('general', 'linkedin_link');
    register_setting('general', 'header_tooltip_text');
    register_setting('general', 'footer_copyright');
    // add_settings_field('contact_address', '<label for="contact_address">' . __('Contact Address', 'contact_address') . '</label>', array(&$this, 'contact_address_html'), 'general');
    add_settings_field('linkedin_link', '<label for="linkedin_link">' . __('LinkedIn Link', 'linkedin_link') . '</label>', array(&$this, 'linkedin_link_html'), 'general');
    add_settings_field('footer_copyright', '<label for="footer_copyright">' . __('Footer Copyright Info', 'footer_copyright') . '</label>', array(&$this, 'footer_copyright_html'), 'general');
    // add_settings_field('emergency_contact_phone', '<label for="emergency_contact_phone">' . __('Emergency Contact Phone', 'emergency_contact_phone') . '</label>', array(&$this, 'emergency_contact_phone_html'), 'general');
    add_settings_field('header_tooltip_text', '<label for="header_tooltip_text">' . __('Leasing Selling Tooltip Text', 'header_tooltip_text') . '</label>', array(&$this, 'header_tooltip_text_html'), 'general');
  }
  function footer_copyright_html() {
    $value = get_option('footer_copyright', '');
    echo '<input type="text" id="footer_copyright" name="footer_copyright" value="'. $value .'" width="300">';
  }
  function header_tooltip_text_html() {
    $value = get_option('header_tooltip_text', '');
    echo '<textarea type="text" id="header_tooltip_text" name="header_tooltip_text" rows="5" cols="40">'. $value .'</textarea>';
  }
  // function contact_address_html() {
  //   $value = get_option('contact_address', '');
  //   echo '<textarea type="text" id="contact_address" name="contact_address" rows="5" cols="40">'. $value .'</textarea>';
  // }
  // function emergency_contact_phone_html() {
  //   $value = get_option('emergency_contact_phone', '');
  //   echo '<input type="text" id="emergency_contact_phone" name="emergency_contact_phone" value="' . $value . '">';
  // }
  function linkedin_link_html() {
    $value = get_option('linkedin_link', '');
    echo '<input type="text" id="linkedin_link" name="linkedin_link" value="' . $value . '">';
  }

  function get_excerpt_by_id($post_id){
      $the_post = get_post($post_id); //Gets post ID
      $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
      $excerpt_length = 55; //Sets excerpt length by word count
      $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images

      if(strlen($the_excerpt) > $excerpt_length) {
        $the_excerpt = trim(substr($the_excerpt,0,$excerpt_length)).'…';
      }

      $the_excerpt = '<p>' . $the_excerpt . '</p>';

      return $the_excerpt;
  }

  /**
   * Auto login after registration.
   */
  function pi_gravity_registration_autologin( $user_id, $user_config, $entry, $password ) {
    $user = get_userdata( $user_id );
    $user_login = $user->user_login;
    $user_password = $password;

      wp_signon( array(
      'user_login' => $user_login,
      'user_password' =>  $user_password,
      'remember' => false
      ) );
  }

  function new_excerpt_more($more) {
    return '...';
  }

  function custom_excerpt_length( $length ) {
    return 20;
  }

}

$fp_theme = new Fourpoint();

function register_editor_style() {
  add_editor_style('editor-styles.css');
}

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}

function is_login_page() {
  return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}
// Get SVG link
function svg( $name, $class='' ){
  echo get_svg( $name, $class );
}
function get_svg( $name, $class='' ){
  return '<svg class="icon '.$name.' '.$class.'"><use xlink:href="#'.$name.'" /></svg>';
}

show_admin_bar(false);

// Return error if email is not set for password retrieval
add_action( 'lostpassword_post', 'email_only_lostpassword_post', 10, 1 );
function email_only_lostpassword_post( $errors ){
  if( !is_email($_POST['user_login']) ){
    $errors->add('invalidcombo', __('<strong>ERROR</strong>: Invalid email address.'));
    return $errors;
  }
}

// Translate some login page text
add_filter( 'gettext', 'email_only_login_labels', 20, 3 );
function email_only_login_labels( $translated_text, $text, $domain ) {
  if (in_array( $GLOBALS['pagenow'], array( 'wp-login.php' ) )) {
    if ($translated_text === 'Username or Email Address') {
      $translated_text = 'Email Address';
    }
    if ($translated_text === 'Please enter your username or email address. You will receive a link to create a new password via email.') {
      $translated_text = 'Please enter your email address. You will receive a link to create a new password via email.';
    }
  }
  return $translated_text;
}

if ( ! function_exists('_log')) {
  function _log ( $log )  {
    if ( is_array( $log ) || is_object( $log ) ) {
      error_log( print_r( $log, true ) );
    } else {
      error_log( $log );
    }
  }
}

/* ==================================================================
         Filter Gravity Forms Submissions for spammy words
================================================================== */
/*
 * Use an array to search a string
 * Allows us to pass the stop words list and our post data
 */
function strpos_arr($haystack, $needle) {
    if (!is_array($needle)) $needle = array($needle);
    foreach($needle as $what) {
      if ( ($pos = stripos($haystack, $what)) !== false ) {
        return $pos;
      }
    }
    return false;
}

/* -------------------------------------------------------------------------------------- */

add_action('gform_pre_submission', 'keywords_check');
// The form ID is currently set to ID 1 - shown in the above line gform_pre_submission_1.
// If you want to apply it to form ID 2 then change _1 it to _2

function keywords_check($form){
// function keywords_check($validation_result){
  // $form = $validation_result["form"];

  //  -------> Enter all the keywords that you want to block. <------------  */
  $stop_words = array(
    'acrotomophilia',
    'alabama hot pocket',
    'alaskan pipeline',
    'anilingus',
    'anus',
    'apeshit',
    'arsehole',
    'asshole',
    'assmunch',
    'auto erotic',
    'autoerotic',
    'babeland',
    'baby batter',
    'baby juice',
    'ball gag',
    'ball gravy',
    'ball kicking',
    'ball licking',
    'ball sack',
    'ball sucking',
    'bangbros',
    'bareback',
    'barely legal',
    'barenaked',
    'bastard',
    'bastardo',
    'bastinado',
    'bbw',
    'bdsm',
    'beaner',
    'beaners',
    'beaver cleaver',
    'beaver lips',
    'bestiality',
    'big black',
    'big breasts',
    'big knockers',
    'big tits',
    'bimbos',
    'birdlock',
    'bitch',
    'bitches',
    'black cock',
    'blonde action',
    'blonde on blonde action',
    'blowjob',
    'blow job',
    'blow your load',
    'blue waffle',
    'blumpkin',
    'bollocks',
    'bondage',
    'boner',
    'boob',
    'boobs',
    'booty call',
    'brown showers',
    'brunette action',
    'bukkake',
    'bulldyke',
    'bullet vibe',
    'bullshit',
    'bung hole',
    'bunghole',
    'busty',
    'butt',
    'buttcheeks',
    'butthole',
    'camel toe',
    'camgirl',
    'camslut',
    'camwhore',
    'carpet muncher',
    'carpetmuncher',
    'chocolate rosebuds',
    'circlejerk',
    'cleveland steamer',
    'clit',
    'clitoris',
    'clover clamps',
    'clusterfuck',
    'cock',
    'cocks',
    'coprolagnia',
    'coprophilia',
    'cornhole',
    'coon',
    'coons',
    'creampie',
    'cum',
    'cumming',
    'cunnilingus',
    'cunt',
    'darkie',
    'date rape',
    'daterape',
    'deep throat',
    'deepthroat',
    'dendrophilia',
    'dick',
    'dildo',
    'dingleberry',
    'dingleberries',
    'dirty pillows',
    'dirty sanchez',
    'doggie style',
    'doggiestyle',
    'doggy style',
    'doggystyle',
    'dog style',
    'dolcett',
    'domination',
    'dominatrix',
    'dommes',
    'donkey punch',
    'double dong',
    'double penetration',
    'dp action',
    'dry hump',
    'dvda',
    'eat my ass',
    'ecchi',
    'ejaculation',
    'erotic',
    'erotism',
    'escort',
    'eunuch',
    'faggot',
    'fecal',
    'felch',
    'fellatio',
    'feltch',
    'female squirting',
    'femdom',
    'figging',
    'fingerbang',
    'fingering',
    'fisting',
    'foot fetish',
    'footjob',
    'frotting',
    'fuck',
    'fuck buttons',
    'fuckin',
    'fucking',
    'fucktards',
    'fudge packer',
    'fudgepacker',
    'futanari',
    'gang bang',
    'gay sex',
    'genitals',
    'giant cock',
    'girl on',
    'girl on top',
    'girls gone wild',
    'goatcx',
    'goatse',
    'god damn',
    'gokkun',
    'golden shower',
    'goodpoop',
    'goo girl',
    'goregasm',
    'grope',
    'group sex',
    'g-spot',
    'guro',
    'hand job',
    'handjob',
    'hard core',
    'hardcore',
    'hentai',
    'homoerotic',
    'honkey',
    'hooker',
    'hot carl',
    'hot chick',
    'how to kill',
    'how to murder',
    'huge fat',
    'humping',
    'incest',
    'intercourse',
    'jack off',
    'jail bait',
    'jailbait',
    'jelly donut',
    'jerk off',
    'jigaboo',
    'jiggaboo',
    'jiggerboo',
    'jizz',
    'juggs',
    'kike',
    'kinbaku',
    'kinkster',
    'kinky',
    'knobbing',
    'leather restraint',
    'leather straight jacket',
    'lemon party',
    'lolita',
    'lovemaking',
    'make me come',
    'male squirting',
    'masturbate',
    'menage a trois',
    'milf',
    'missionary position',
    'motherfucker',
    'mound of venus',
    'mr hands',
    'muff diver',
    'muffdiving',
    'nambla',
    'nawashi',
    'negro',
    'neonazi',
    'nigga',
    'nigger',
    'nig nog',
    'nimphomania',
    'nipple',
    'nipples',
    'nsfw images',
    'nude',
    'nudity',
    'nympho',
    'nymphomania',
    'octopussy',
    'omorashi',
    'one cup two girls',
    'one guy one jar',
    'orgasm',
    'orgy',
    'paedophile',
    'paki',
    'panties',
    'panty',
    'pedobear',
    'pedophile',
    'pegging',
    'penis',
    'phone sex',
    'piece of shit',
    'pissing',
    'piss pig',
    'pisspig',
    'playboy',
    'pleasure chest',
    'pole smoker',
    'ponyplay',
    'poof',
    'poon',
    'poontang',
    'punany',
    'poop chute',
    'poopchute',
    'porn',
    'porno',
    'pornography',
    'prince albert piercing',
    'pthc',
    'pubes',
    'pussy',
    'queaf',
    'queef',
    'quim',
    'raghead',
    'raging boner',
    'rape',
    'raping',
    'rapist',
    'rectum',
    'reverse cowgirl',
    'rimjob',
    'rimming',
    'rosy palm',
    'rosy palm and her 5 sisters',
    'rusty trombone',
    'sadism',
    'santorum',
    'scat',
    'schlong',
    'scissoring',
    'semen',
    'sex',
    'sexo',
    'sexy',
    'shaved beaver',
    'shaved pussy',
    'shemale',
    'shibari',
    'shit',
    'shitblimp',
    'shitty',
    'shota',
    'shrimping',
    'skeet',
    'slanteye',
    'slut',
    's&m',
    'smut',
    'snatch',
    'snowballing',
    'sodomize',
    'sodomy',
    'spic',
    'splooge',
    'splooge moose',
    'spooge',
    'spread legs',
    'spunk',
    'strap on',
    'strapon',
    'strappado',
    'strip club',
    'style doggy',
    'suck',
    'sucks',
    'suicide girls',
    'sultry women',
    'swastika',
    'swinger',
    'tainted love',
    'taste my',
    'tea bagging',
    'threesome',
    'throating',
    'tied up',
    'tight white',
    'tit',
    'tits',
    'titties',
    'titty',
    'tongue in a',
    'topless',
    'tosser',
    'towelhead',
    'tranny',
    'tribadism',
    'tub girl',
    'tubgirl',
    'tushy',
    'twat',
    'twink',
    'twinkie',
    'two girls one cup',
    'undressing',
    'upskirt',
    'urethra play',
    'urophilia',
    'vagina',
    'venus mound',
    'vibrator',
    'violet wand',
    'vorarephilia',
    'voyeur',
    'vulva',
    'wank',
    'wetback',
    'wet dream',
    'white power',
    'wrapping men',
    'wrinkled starfish',
    'xx',
    'xxx',
    'yaoi',
    'yellow showers',
    'yiffy',
    'zoophilia',
    '🖕',
    'cialis',
    'viagra',
    'bitcoin',
    'top job',
    'terror',
    'online dating',
    'seo',
    'passive income'
  );

  $stop_id = array();

  foreach ($_POST as $id => $value) {
    if (strpos_arr($value, $stop_words) !== false) {
      $stop_id[] = $id;
    }
  }

  if (sizeof($stop_id) > 0) {
    // $validation_result['is_valid'] = false;
    $_POST['input_6'] = "No";
  }

}
