<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://acasilum.com
 * @since             1.0.0
 * @package           AllanTest
 *
 * @wordpress-plugin
 * Plugin Name:       AllanTest
 * Plugin URI:        https://acasilum.com
 * Description:       Allan Test
 * Version:           1.0.0
 * Author:            Allan Casilum
 * Author URI:        https://acasilum.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       allan-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Require the autoload vendor.
 */
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

function run_allan_test() {
    /**
     * Lets check if the woocommerce is active 
     */
    if ( ! function_exists( 'is_woocommerce_activated' ) ) {
        if ( class_exists( 'woocommerce' ) ) {
            
            //set the controller
            \AllanTest\WC_Product_Controller::get_instance()->init();
            
        }
    }
}

/**
 * Initialize the plugin, using the WordPress init hook.
 */
add_action('init', 'run_allan_test');

