<?php

/**
 * Scripts File
 * Handles to admin functionality & other functions
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Load Admin styles & scripts
 */
function esb_pto_admin_scripts(){
    
     // Load our admin stylesheet.
     wp_enqueue_style( 'esb-pto-admin-style', ESB_PTO_URL . 'css/admin-style.css' );
     
	 // Load main jquery and sortable jquery
     wp_enqueue_script( array( 'jquery', 'jquery-ui-sortable' ) );
	 
     // Load our admin script.
     wp_enqueue_script( 'esb-pto-admin-script', ESB_PTO_URL . 'js/admin-script.js' );
     
}

//add action to load scripts and styles for the back end
add_action( 'admin_enqueue_scripts', 'esb_pto_admin_scripts' );

?>