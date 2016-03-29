<?php

/**
 * Admin File
 * Handles to admin functionality & other functions
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Feature column
 *
 * Handles the feature columns
 */
function esb_pto_custom_columns( $column, $post_id ) {
    
    global $post;
     
    switch ( $column ) {
	case 'drag' :
                            $order = isset( $post->menu_order ) ? $post->menu_order : 0;
                            echo '<span title="'.__( 'Drag', 'esbpto' ).'" class="drag-handle dashicons dashicons-sort"></span> <span title="'.__( 'Order Number', 'esbpto' ).'"><strong>' . $order . '</strong></span>';
                            break;
    }
}

/**
 * Add New Column
 */
function esb_pto_add_custom_columns($new_columns) {
    
    $new_columns['drag']    = _x('Drag','column name','esbpto');

    return $new_columns;
}

/**
 * Add Drag Column to all post type
 */
function esb_pto_add_drag_column() {
    
    //Get all post types
    $post_types = esb_pto_get_post_types();
    foreach ( $post_types as $post_type ) {
        add_action( 'manage_'.$post_type.'_posts_custom_column' , 'esb_pto_custom_columns', 10, 2 );
        add_filter( 'manage_edit-'.$post_type.'_columns' , 'esb_pto_add_custom_columns' );
    }
}

/**
 * Validate Settings
 */
function esb_pto_settings_validate( $input ) {
    
    $input['drag_post_types']   = isset( $input['drag_post_types'] ) ? esb_pto_escape_slashes_deep( $input['drag_post_types'] ) : '';
    $input['sort_post_types']   = isset( $input['sort_post_types'] ) ? esb_pto_escape_slashes_deep( $input['sort_post_types'] ) : '';
    
    return $input;
}

/**
 * Add Register Settings
 */
function esb_pto_register_settings() {
    
    register_setting( 'esb-pto-settings-group', 'esb_pto_settings', 'esb_pto_settings_validate' );
}

/**
 * Adding Menu Pages
 */
function esb_pto_add_menu_pages() {

    add_options_page( __( 'Post Type Sort Order Settings', 'esbpto' ), __( 'Sort Order', 'esbpto' ), 'manage_options', 'esb-pto-settings', 'esb_pto_settings_page' );
}

/**
 * Settings Page.
 */
function esb_pto_settings_page() {
    
    include ESB_PTO_DIR . '/includes/admin/views/settings-page.php';
}

/**
 * Update post order by AJAX
 */
function esb_pto_update_sort_order() {
    
    if( !empty( $_POST['postorders'] ) ) {
        
        foreach( $_POST['postorders'] as $sort_order => $post_id ) {
            
            // Update post menu order
            $post_order_args = array(
                                        'ID'            => $post_id,
                                        'menu_order'    => ( $sort_order + 1 )
                                    );

            // Update the post into the database
            wp_update_post( $post_order_args );
        }
        echo '1';
        exit;
    }
}

/**
 * Display all posts order by menu order
 */
function esb_pto_display_posts_by_menu_order( $query ) {
    
    //Get all post types
    $all_post_types = esb_pto_get_order_post_types();
    $current_post_type = isset( $query->query['post_type'] ) ? $query->query['post_type'] : '';
    if( in_array( $current_post_type, $all_post_types ) ) { // Check current post type have selected
        
        if( $query->is_admin && !isset( $_GET['orderby'] ) ) {
            $query->set( 'orderby', 'menu_order' );
            $query->set( 'order', 'ASC' );
        }
    }
}

/**
 * Add save order button
 */
function esb_pto_add_save_order_button() {
    
    //Get all post types
    $all_post_types = esb_pto_get_post_types();
    
    $current_post_type = get_post_type();
    if( in_array( $current_post_type, $all_post_types ) ) { // Check current post type have selected
        
        echo '<span class="spinner"></span>';
        echo '<input type="button" name="esb_pto_posts_save_order" id="esb_pto_posts_save_order" class="button-primary alignright" value="'.__( 'Save Order', 'esbpto' ).'" />';
    }
}

/**
 * Add plugin settings page link
 */
function esb_pto_plugin_action_links( $links, $file ) {
    
    if ( $file != ESB_PTO_BASEPATH )
        return $links;

    $settings_link = '<a href="' . menu_page_url( 'esb-pto-settings', false ) . '">' . __( 'Settings', 'esbpto' ) . '</a>';

    array_unshift( $links, $settings_link );

    return $links;
}

//add action to drag & drop order
add_action( 'init', 'esb_pto_add_drag_column', 99 );

//add action to add settings page 
add_action( 'admin_menu', 'esb_pto_add_menu_pages' );

//add action to call register settings function
add_action( 'admin_init', 'esb_pto_register_settings' );

//add action to update post order by draggable
add_action( 'wp_ajax_update_sort_order', 'esb_pto_update_sort_order' );
add_action( 'wp_ajax_nopriv_update_sort_order', 'esb_pto_update_sort_order' );

//add action to display all posts order by menu order
add_action( 'pre_get_posts', 'esb_pto_display_posts_by_menu_order' );

//add action to add save order button
add_action( 'restrict_manage_posts', 'esb_pto_add_save_order_button' );

//add filter to add plugin settings page link
add_filter( 'plugin_action_links', 'esb_pto_plugin_action_links', 10, 2 );

?>