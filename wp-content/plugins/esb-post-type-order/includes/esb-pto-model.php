<?php

/**
 * Model File
 * Handles to database functionality & other functions
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
* Escape Attr
*/
function esb_pto_escape_attr($data){

    if( !empty( $data ) ) {
        $data = esc_attr(stripslashes_deep($data));
    }
    return $data;
}

/**
* Strip Slashes From Array
*/
function esb_pto_escape_slashes_deep($data = array(),$flag=true){

    if($flag != true) {
        $data = esb_pto_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/**
* Strip Html Tags 
* 
* It will sanitize text input (strip html tags, and escape characters)
*/
function esb_pto_nohtml_kses($data = array()) {

    if ( is_array($data) ) {

        $data = array_map(array($this,'esb_pto_nohtml_kses'), $data);

    } elseif ( is_string( $data ) ) {

        $data = wp_filter_nohtml_kses($data);
    }

    return $data;
}

/**
 * Convert Object To Array
 */
function esb_pto_object_to_array($result) {

    $array = array();
    foreach ($result as $key=>$value)
    {	
        if (is_object($value)) {
            $array[$key]=esb_pto_object_to_array($value);
        } else {
            $array[$key]=$value;
        }
    }
    return $array;
}

/**
 * Get all post types
 */
function esb_pto_get_post_types( $getall = false ) {
    
    global $esb_pto_settings;
    
    $db_post_types = !empty( $esb_pto_settings['drag_post_types'] ) ? $esb_pto_settings['drag_post_types'] : array();
    
    $post_types = get_post_types( '', 'names' );
    unset( $post_types['attachment'] );
    unset( $post_types['revision'] );
    unset( $post_types['nav_menu_item'] );
    
    if( $getall ) {
        return $post_types;
    }
    
    foreach( $post_types as $post_type_key => $post_type ) {
        if( !in_array( $post_type_key, $db_post_types ) ) {
            unset( $post_types[$post_type_key] );
        }
    }
    
    return $post_types;
}

/**
 * Get all order post types
 */
function esb_pto_get_order_post_types( $getall = false ) {
    
    global $esb_pto_settings;
    
    $db_post_types = !empty( $esb_pto_settings['sort_post_types'] ) ? $esb_pto_settings['sort_post_types'] : array();
    
    $post_types = get_post_types( '', 'names' );
    unset( $post_types['attachment'] );
    unset( $post_types['revision'] );
    unset( $post_types['nav_menu_item'] );
    
    if( $getall ) {
        return $post_types;
    }
    
    foreach( $post_types as $post_type_key => $post_type ) {
        if( !in_array( $post_type_key, $db_post_types ) ) {
            unset( $post_types[$post_type_key] );
        }
    }
    
    return $post_types;
}
?>