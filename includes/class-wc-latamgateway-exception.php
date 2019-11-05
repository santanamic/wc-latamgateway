<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'Wc_LatamGateway_Exception' ) ) {

	/**
	 * The Exception class.
	 *
	 * @link       https://github.com/latamgateway/woocommerce-plugin
	 * @since      1.0.0
	 *
	 * @package    wc-latamgateway
	 * @subpackage wc-latamgateway/includes/api/
	 * @author     AQUARELA - WILLIAN SANTANA <williansantanamic@gmail.com>
	 */
	class Wc_LatamGateway_Exception {
		/**
		 * The HTTP body of the server response either as Json or string.
		 *
		 * @access   protected
		 * @since    1.0.0
		 * @var   mixed
		 */
		protected $responseBody;

		/**
		 * The HTTP header of the server response.
		 *
		 * @access   protected
		 * @since    1.0.0
		 * @var      string[]
		 */
		protected $responseHeaders;

		/**
		 * The deserialized response object
		 *
		 * @access   protected
		 * @since    1.0.0     
		 * @var      $responseObject;
		 */
		protected $responseObject;

		/**
		 * Constructor
		 *
		 * @access   public
		 * @since    1.0.0
		 * @param    string $message           Error message
		 * @param    int    $code              HTTP status code
		 * @param    string $responseHeaders   HTTP response header
		 * @param    mixed  $responseBody      HTTP body of the server response either as Json or string
		 */
		public function __construct( $message = '', $code = 0, $responseHeaders = NULL, $responseBody = NULL )
		{

		parent::__construct($message, $code);
		$this->responseHeaders = $responseHeaders;
		$this->responseBody = $responseBody;

		}

		/**
		 * Gets the HTTP response header
		 *
		 * @access   public
		 * @since    1.0.0
		 * @return   string   HTTP response header
		 */
		public function getResponseHeaders()
		{

		return $this->responseHeaders;

		}
		/**
		 * Gets the HTTP body of the server response either as Json or string
		 *
		 * @access   public
		 * @since    1.0.0
		 * @return   mixed   HTTP body of the server response either as Json or string
		 */
		public function getResponseBody()
		{

		return $this->responseBody;

		}
		/**
		 * Sets the deseralized response object (during deserialization)
		 *
		 * @access   public
		 * @since    1.0.0
		 * @param    mixed   Deserialized response object
		 * @return   void
		 */
		public function setResponseObject( $obj )
		{

		$this->responseObject = $obj;

		}
		/**
		 * Gets the deseralized response object (during deserialization)
		 *
		 * @access   public
		 * @since    1.0.0
		 * @return   mixed   the deserialized response object
		 */
		public function getResponseObject()
		{

		return $this->responseObject;

		}
	}
}