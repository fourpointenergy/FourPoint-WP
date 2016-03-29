<?php
/*
Plugin Name: ESB Post Type Order
Plugin URI: https://wordpress.org/plugins/esb-post-type-order/
Description: Change the any post type menu order using drag & drop.
Version: 1.0.0
Author: Henry
Author URI: http://esparkinfo.com/
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'ESB_PTO_DIR' ) ) {
    define('ESB_PTO_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'ESB_PTO_URL' ) ) {
    define('ESB_PTO_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'ESB_PTO_META_PREFIX' ) ) {
    define( 'ESB_PTO_META_PREFIX', '_esb_pto_' ); // meta box prefix
}
if( !defined('ESB_PTO_BASEPATH') ){
    define('ESB_PTO_BASEPATH', plugin_basename( __FILE__ ) );  // plugin base path
}
if( !defined('ESB_PTO_BASENAME') ){
    define('ESB_PTO_BASENAME', 'esb-post-type-order');  // plugin base name
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 */

function esb_pto_load_textdomain() {

  load_plugin_textdomain( 'esbpto', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}
add_action( 'init', 'esb_pto_load_textdomain' ); 

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 */
register_activation_hook( __FILE__, 'esb_pto_install' );

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 */
register_deactivation_hook( __FILE__, 'esb_pto_uninstall');

/**
 * Plugin Setup (On Activation)
 *
 * Does the initial setup,
 * stest default values for the plugin options.
 */
function esb_pto_install() {
    
    //get option for when plugin is activating first time
    $esb_pto_set_option = get_option( 'esb_pto_set_option' );

    if( empty( $esb_pto_set_option ) ) { //check plugin version option

        $settings = array(
                                'drag_post_types' => array( 'post' ),
                                'sort_post_types' => array( 'post' )
                            );
        
        //update settings for this plugin
        update_option( 'esb_pto_settings', $settings );
        
        //update plugin version to option 
        update_option( 'esb_pto_set_option', '1.0' );
    }
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Delete plugin options.
 */
function esb_pto_uninstall() {
    
}

global $esb_pto_settings;
$esb_pto_settings    = get_option( 'esb_pto_settings' );

//include model file
include ESB_PTO_DIR . '/includes/esb-pto-model.php';

//include scripts file
include ESB_PTO_DIR . '/includes/esb-pto-scripts.php';

//include admin file
include ESB_PTO_DIR . '/includes/admin/esb-pto-admin.php';
?>