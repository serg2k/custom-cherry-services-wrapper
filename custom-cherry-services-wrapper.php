<?php
/**
 * Plugin Name: Custom Cherry Services Wrapper
 * Plugin URI:
 * Description: This plugin wraps Cherry Service list item into link.
 * Version:     1.0.0
 * Author:      serg2k
 * Author URI:  
 * Text Domain: custom-cherry-services-wrapper
 * Domain Path: /languages/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die();
}

function ccsw_wrap_cherry_services_item( $tpl ) {
    global $wp_query;
    $link = get_permalink();

    if ( isset( $wp_query->query['post_type'] ) ) {
        $post_type = $wp_query->query['post_type'];
    }
    // If current page is service page do nothing
    if ( $post_type == 'cherry-services' ) {
        return $tpl;
    }

    return $tpl . '<a href="' . $link . '" style="
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 2;"></a>';
}
add_filter ( 'cherry_get_services_loop', ccsw_wrap_cherry_services_item );
