<?php

/**
 * Plugin Name:       Latam Gateway for WooCommerce
 * Plugin URI:        https://github.com/santanamic/wc-latamgateway
 * Description:       Take payments on CredtCard, Deposit and Boleto  using Latam Gateway.
 * Version:           1.0.0
 * Author:            WILLIAN SANTANA
 * Author URI:        https://github.com/santanamic/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-latamgateway
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

define( 'WC_LATAMGATEWAY_NAME', 'WooCommerce Latam Gateway' );
define( 'WC_LATAMGATEWAY_VERSION', '1.0.0' );
define( 'WC_LATAMGATEWAY_DEBUG_OUTPUT', 0 );
define( 'WC_LATAMGATEWAY_BASENAME', plugin_basename( __FILE__ ) );
define( 'WC_LATAMGATEWAY_SLUG', plugin_basename( plugin_dir_path( __FILE__ ) ) );
define( 'WC_LATAMGATEWAY_CORE_FILE', __FILE__ );
define( 'WC_LATAMGATEWAY_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'WC_LATAMGATEWAY_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

require_once( WC_LATAMGATEWAY_PATH . 'vendor/autoload.php' );

/**
 * The code that runs during plugin activation and The code that runs during plugin deactivation.
 */
register_activation_hook( __FILE__, 'wc_latamgateway_plugin_activate' );
register_deactivation_hook( __FILE__, 'wc_latamgateway_plugin_deactivate' );

/**
 * Initial hook for plugin run and Initial hook for plugin internationalization.
 */
add_action( 'plugins_loaded', 'wc_latamgateway' );
add_action( 'plugins_loaded', 'wc_latamgateway_plugin_i18n' );

/**
 * Initial hook for add admin scripts and styles.
 */
add_filter( 'plugin_action_links_' . WC_LATAMGATEWAY_BASENAME, 'wc_latamgateway_admin_links' );
add_action( 'admin_enqueue_scripts', 'wc_latamgateway_admin_enqueue_script' );
add_action( 'admin_enqueue_scripts', 'wc_latamgateway_admin_enqueue_styles' );
