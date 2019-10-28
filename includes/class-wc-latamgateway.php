<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'Wc_LatamGateway' ) ) {

/**
 * The core plugin class.
 *
 * @link       https://github.com/latamgateway/woocommerce-plugin
 * @since      1.0.0
 *
 * @package    wc-latamgateway
 * @subpackage wc-latamgateway/includes/
 * @author     AQUARELA - WILLIAN SANTANA <williansantanamic@gmail.com>
 */
	final class Wc_LatamGateway {

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of the plugin.
	 */
		private static $_instance = NULL;
		
	/**
	 * Main WC_Payment_Gateways Instance.
	 *
	 * Ensures only one instance of WC_Payment_Gateways is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @return WC_Payment_Gateways Main instance
	 */
		public static function instance() 
		{
		
		if ( is_null( SELF::$_instance ) ) : 

			SELF::$_instance = new SELF();
			SELF::$_instance->init_globals();
			SELF::$_instance->init_actions();
		
		endif;
		
		return SELF::$_instance;
		
		}
		
	/**
	 * A dummy constructor to prevent this class from being loaded more than once.
	 *
	 * @since    1.0.0
	 */
		private function __construct() 
		{
		
		}
		
	/**
	 * You cannot clone this class.
	 *
	 * @since    1.0.0
	 * @codeCoverageIgnore
	 */
		public function __clone() 
		{

		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'wc-latamgateway' ), '1.0.0' );
		
		}

	/**
	 * You cannot unserialize instances of this class.
	 *
	 * @since    1.0.0
	 * @codeCoverageIgnore
	 */
		public function __wakeup() 
		{
		
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'wc-latamgateway' ), '1.0.0' );
		
		}
		
	/**
	 * Setup the class globals.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @codeCoverageIgnore
	 */
		public function init_globals() 
		{
		
		}

	/**
	 * Setup the hooks, actions and filters.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
		private function init_actions() 
		{

		add_action( 'woocommerce_payment_gateways', array( __CLASS__, 'add_gateway' ) );
		add_filter( 'woocommerce_checkout_fields' , array( __CLASS__, 'add_checkout_fields' ) );
		if ( is_admin() )
			add_action( 'admin_notices', array( __CLASS__, 'plugins_missing_notice' ) );
			add_action( 'admin_notices', array( __CLASS__, 'credentials_missing_notice' ) );
			add_action( 'admin_notices', array( __CLASS__, 'currency_not_supported_notice' ) );
		}

	/**
	 * Check PHP version
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
		public function get_plugin_name() 
		{
		
		return $this->_plugin_name;
		
		}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
		public function get_version() 
		{
		
		return $this->_version;
		
		}
		
	/**
	 * The gateway API.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
		public function api() 
		{

		return new Wc_LatamGateway_Api();
		
		}

	/**
	 * The environment data.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
		public function environment() 
		{

		return Wc_LatamGateway_Environment::instance();
		
		}

	/**
	 * The telemetry start.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
		public function telemetry() 
		{

		return Wc_LatamGateway_Telemetry::instance();
		
		}

	/**
	 * Gateway add methods function
	 *
	 * @since    1.0.0
	 * @param    array    $payment_methods    Current array of registered payment methods
	 * @return   array    $payment_methods    Updated array of registered payment methods
	 */
		public static function add_gateway( $payment_methods ) 
		{
			
		$payment_methods[] = 'Wc_LatamGateway_Gateway_Method_General';

		return $payment_methods;
		
		}
		
	/**
	 * Add birth date field in checkout
	 *
	 * @since    1.0.0
	 * @param    array    $fields    All checkout fields
	 * @return   array    $fields    Updated fields
	 */

		public static function add_checkout_fields( $fields ) 
		{

		$settings = get_option( 'woocommerce_wc_latamgateway_settings' );
	
		if( 'yes' === $settings['enable_birth_field'] ){
			$required = true;
			if( 'yes' !== $settings['required_birth_field'] ){
				$required = false;
			}
			if( ! isset( $fields['billing']['billing_birthdate']) && isset( $fields['billing']['billing_cpf'] ) ){
				$aft_priority = $fields['billing']['billing_cpf']['priority'] + 1;
		
				$fields['billing']['billing_birthdate'] = array(
					'priority' => $aft_priority,
					'label'     => __('Birthdate', 'wc-latamgateway'),
					'required'  => $required,
					'class'     => array('form-row-wide'),
					'clear'     => true
				);
			}
		}
		
		return $fields;
		
		}
	
	/**
	 * Requireds plugins.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
		public static function plugins_missing_notice() {
		
		include dirname( __FILE__ ) . '/views/html-notice-missing-plugins.php';			
		
		}
		
	/**
	 * Requireds credentials.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
		public static function credentials_missing_notice() {
		
		include dirname( __FILE__ ) . '/views/html-notice-credential-missing.php';			
		
		}
		
	/**
	 * Requireds credentials.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
		public static function currency_not_supported_notice() {
		
		include dirname( __FILE__ ) . '/views/html-notice-currency-not-supported.php';			
		
		}

	}

}
