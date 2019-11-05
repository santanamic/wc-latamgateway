<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/*
 * Functions for payment method.
 *
 * @link       https://github.com/latamgateway/woocommerce-plugin
 * @since      1.0.0
 * 
 * @package    wc-latamgateway
 * @subpackage wc-latamgateway/includes/gateway/methods/latamgateway/
 * @author     AQUARELA - WILLIAN SANTANA <williansantanamic@gmail.com>
 */

if ( ! function_exists( 'wc_latamgateway_method_general_admin_enqueue' ) ) {

	/**
	 * Register admin styles and scripts for payment method
	 *
	 * @since    1.0.0
	 * @return   array    void
	 */
	function wc_latamgateway_method_general_admin_enqueue() 
	{

	wp_enqueue_script( 'wc-latamgateway-method-latamgateway-admin',
		WC_LATAMGATEWAY_URI . 'includes/gateway/methods/general/assets/admin/js/script.js' );
	wp_enqueue_style( 'wc-latamgateway-method-latamgateway-admin',
		WC_LATAMGATEWAY_URI . 'includes/gateway/methods/general/assets/admin/css/style.css' );

	}

}

if ( ! function_exists( 'wc_latamgateway_method_general_public_enqueue' ) ) {

	/**
	 * Register public styles and scripts for payment method
	 *
	 * @since    1.0.0
	 * @return   array    void
	 */
	function wc_latamgateway_method_general_public_enqueue() 
	{

	wp_enqueue_script( 'wc-latamgateway-method-latamgateway',
		WC_LATAMGATEWAY_URI . 'includes/gateway/methods/general/assets/public/js/script.js' );
	wp_enqueue_style( 'wc-latamgateway-method-latamgateway',
		WC_LATAMGATEWAY_URI . 'includes/gateway/methods/general/assets/public/css/style.css' );

	}

}