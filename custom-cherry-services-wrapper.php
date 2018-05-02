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
    $post_id = $post->ID;
    $link = get_permalink( $post_id );

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
