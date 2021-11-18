<?php
// ACF Custom Fields
// if( ! WP_DEBUG ){
// 	define( 'ACF_LITE' , true );
// }

add_filter('acf/settings/save_json', 'acf_json_save_point');
function acf_json_save_point( $path ) {
	return get_template_directory() . '/inc/acf-json/';
}

add_filter('acf/settings/load_json', 'acf_json_load_point');
function acf_json_load_point( $paths ) {
	$paths[] = get_template_directory() . '/inc/acf-json/';
	return $paths;
}
