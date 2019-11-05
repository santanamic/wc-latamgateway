<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'Wc_LatamGateway_Gateway' ) ) {

	/**
	 * Abstract class that will be inherited by all payment methods in gateway.
	 *
	 * @link       https://github.com/latamgateway/woocommerce-plugin
	 * @since      1.0.0
	 *
	 * @package    Wc_LatamGateway
	 * @subpackage Wc_LatamGateway/includes/abstracts/
	 * @author     AQUARELA - WILLIAN SANTANA <williansantanamic@gmail.com>
	 */
	abstract class Wc_LatamGateway_Gateway extends WC_Payment_Gateway 
	{
		/**
		 * The LatamGateway Api.
		 *
		 * @access   protected
		 * @since    1.0.0
		 * @var      Wc_LatamGateway_Api   The API class API for integration.
		 */
		protected $api;

		/**
		 * Init payment method.
		 *
		 * @access   private
		 * @since    1.0.0
		 * @param    string    $environment     Environment type, use sandbox or production.
		 * @return   void
		 */
		protected function init_gateway() 
		{

		// Build class attributes for plugin options.
		$this->init_form_fields();
		$this->init_settings();

		// Define gateway set variables.
		$this->title = $this->get_option( 'title' );
		$this->description = $this->get_option( 'description' );
		$this->enabled = $this->get_option( 'enabled' );

		// Define plugin set variables.
		$this->debug = $this->get_option( 'debug' );
		$this->is_sandbox = $this->get_option( 'testmode' );

		// Load gateway methods.
		$this->init_api();
		$this->init_hooks();
		$this->init_require();

		} 

		/**
		 * Init API.
		 *
		 * @access   private
		 * @since    1.0.0
		 * @return   void
		 */
		private function init_api() 
		{

		$this->api = wc_latamgateway()->api();

		if ( $this->is_sandbox != 'yes' ) {
			$account_key = $this->get_option( 'account_key' );
			$this->api->enable_production(true);
		}else {
			$account_key = $this->get_option( 'account_key_sandbox' );
		}
		$this->api->set_credential($this->get_option( 'email' ), $this->get_option( 'passsword' ), $account_key);

		} 
	}
}