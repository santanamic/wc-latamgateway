<?php

/**
 * Fired during plugin activation.
 *
 * @link       https://github.com/latamgateway/woocommerce-plugin
 * @since      1.0.0
 * 
 * @package    wc-latamgateway
 * @subpackage wc-latamgateway/includes/functions
 * @author     AQUARELA - WILLIAN SANTANA <williansantanamic@gmail.com>
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! function_exists( 'wc_latamgateway_plugin_activate' ) ) {

	/**
	 * Plugin activate call function
	 *
	 * @since    1.0.0
	 * @return   void
	 */
	function wc_latamgateway_plugin_activate() 
	{

	}

}

if ( ! function_exists( 'wc_latamgateway_plugin_deactivate' ) ) {

	/**
	 * Plugin deactivation call function
	 *
	 * @since    1.0.0
	 * @return   void
	 */
	function wc_latamgateway_plugin_deactivate() 
	{

	}

}

if ( ! function_exists( 'wc_latamgateway_plugin_i18n' ) ) {

	/**
	 * Load the plugin text domain for translation
	 *
	 * @since    1.0.0
	 * @return   void
	 */
	function wc_latamgateway_plugin_i18n() 
	{

	load_plugin_textdomain( 'wc-latamgateway', false, WC_LATAMGATEWAY_SLUG . '/languages/' );

	}

}

if ( ! function_exists( 'wc_latamgateway' ) ) {

	/**
	 * Begins execution of the plugin.
	 *
	 * @since    1.0.0
	 * @return   Wc_LatamGateway
	 */
	function wc_latamgateway() 
	{

	$plugin = Wc_LatamGateway::instance();

	return $plugin;

	}

}