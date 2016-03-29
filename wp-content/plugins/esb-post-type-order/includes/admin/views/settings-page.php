<?php

/**
 * Settings Page
 * Handles to settings
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

    global $esb_pto_settings;
    
    $db_post_types      = !empty( $esb_pto_settings['drag_post_types'] ) ? $esb_pto_settings['drag_post_types'] : array();
    $db_sort_post_types = !empty( $esb_pto_settings['sort_post_types'] ) ? $esb_pto_settings['sort_post_types'] : array();
    
    //Get all post types
    $all_post_types = esb_pto_get_post_types( true );
    
?>
<div class="wrap">
    
    <h2><?php _e( 'Post Type Sort Order Settings', 'esbpto' ); ?></h2>
    
    <form method="post" action="options.php">
        
        <?php settings_fields( 'esb-pto-settings-group' ); ?>

        <table class="form-table esb-pto-form-table">

            <tr valign="top">
                <td scope="row">
                    <label for="esb_pto_settings_drag_post_types"><?php _e( 'Select Post Types - Drag', 'esbpto' ); ?></label>
                </td>
                <td>
                    <select id="esb_pto_settings_drag_post_types" name="esb_pto_settings[drag_post_types][]" multiple="multiple">
                        <?php 
                            foreach( $all_post_types as $post_type_key => $post_type ) {
                                $obj    = get_post_type_object( $post_type_key );
                                $title  = $obj->label;
                        ?>
                            <option value="<?php echo $post_type_key ?>" <?php echo selected( in_array( $post_type_key, $db_post_types ), true ) ?>><?php echo $title ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <span class="description"><?php _e( 'Select post type for manage posts order using drag & drop.', 'esbpto' ) ?></span>
                </td>
            </tr>

            <tr valign="top">
                <td scope="row">
                    <label for="esb_pto_settings_sort_post_types"><?php _e( 'Select Post Types - Sort', 'esbpto' ); ?></label>
                </td>
                <td>
                    <select id="esb_pto_settings_sort_post_types" name="esb_pto_settings[sort_post_types][]" multiple="multiple">
                        <?php 
                            foreach( $all_post_types as $post_type_key => $post_type ) {
                                $obj    = get_post_type_object( $post_type_key );
                                $title  = $obj->label;
                        ?>
                            <option value="<?php echo $post_type_key ?>" <?php echo selected( in_array( $post_type_key, $db_sort_post_types ), true ) ?>><?php echo $title ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <span class="description"><?php _e( 'Select post type for display posts based on order in back-end.', 'esbpto' ) ?></span>
                </td>
            </tr>

            <tr valign="top">
                <td scope="row">
                    <label><?php _e( 'Use parameter on front query', 'esbpto' ); ?></label>
                </td>
                <td>
                    <?php
                        $args = array(
                                            'orderby'   => 'menu_order'
                                        );
                        echo '<pre>';
                        print_r($args); 
                        echo '</pre>';
                    ?>
                </td>
            </tr>

        </table>
        
        <?php submit_button(); ?>

    </form>
        
</div>