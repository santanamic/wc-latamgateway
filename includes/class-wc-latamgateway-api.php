<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'Wc_LatamGateway_Api' ) ) {

/**
 * The plugin class for API integration.
 */

	class Wc_LatamGateway_Api {

		private $_is_production = false;
		private $_config;
		private $_auth_request;
		private $_order_request;
		private $_bank_request;
		private $_access;
		private $_bank;
		private $_transaction;
		public $customer;
		public $order;
		public $items;


		public function __construct() 
		{
			$this->_config        =  new \LatamGateway\Configuration;
			$this->_client        =  new \LatamGateway\Client;
			$this->_auth_request  =  new \LatamGateway\SDK\Requests\Auth\OAuth2Request;
			$this->_order_request =  new \LatamGateway\SDK\Requests\Order\OrderRequest;
			$this->_bank_request  =  new \LatamGateway\SDK\Requests\Bank\BankRequest;
			$this->_access        =  new \LatamGateway\SDK\Model\AccessToken;
			$this->_bank          =  new \LatamGateway\SDK\Model\Bank;
			$this->_transaction   =  new \LatamGateway\SDK\Model\Transaction;
			$this->customer       =  new \LatamGateway\SDK\Model\Customer;
			$this->order          =  new \LatamGateway\SDK\Model\Order;
			$this->items          =  new \LatamGateway\SDK\Model\Items;
		}

		private function generate_token(){
			if( NULL !== $this->_access->getEmail() && 
				NULL !== $this->_access->getPassword() && 
				NULL !== $this->_access->getAccountKey() 
			) {
				$this->_auth_request->setData($this->_access->container);
				$this->_auth_request->isProductionEnvironment($this->_is_production);
				try {
					$auth = $this->_auth_request->run();	
					$this->_access->setToken($auth->getToken());
					return $this;
				} catch (Exception $e) {
					echo 'Exception when calling generate_token: ', $e->getMessage(), PHP_EOL;
				}
			}else{
				throw new Exception('Insufficient access credentials for token generation. Be sure to add all access credentials.');
			}
		}

		private function config(){
			$this->_config->setAuthentication('ACCOUNT_KEY', $this->_access->getAccountKey());
			$this->_config->setAuthentication('ACCOUNT_TOKEN', $this->_access->getToken());
			$this->_config->setUserAgent('LatamGateway_WP/' . WC_LATAMGATEWAY_VERSION . '/php');
			return $this->_config;
		}

		private function client(){
			$this->_client->setConfig($this->config());
			return $this->_client;
		}

		private function transaction(){
			$this->_transaction->setCustomer($this->customer);
			$this->_transaction->setOrder($this->order);
			return $this->_transaction->container;
		}

		private function banks_request(){
			$this->_bank_request->setClient($this->client());
			return $this->_bank_request;
		}
		
		private function order_request(){
			$this->_order_request->setClient($this->client());
			$this->_order_request->setData($this->transaction());
			return $this->_order_request;
		}
		
		public function enable_production(bool $is_enabled){
			$this->_is_production = $is_enabled;
			return $this;
		}

		public function set_credential($email, $passsword, $account_key){
			$this->_access->setEmail($email);
			$this->_access->setPassword($passsword);
			$this->_access->setAccountKey($account_key);
			return $this;
		}
		
		public function list_banks(){
			$this->generate_token();
			return $this->banks_request()->run();		
		}
		
		public function create_order(){
			$this->generate_token();
			return $this->order_request()->run();		
		}

		public function get_form_url($form_id){
			$url = $this->_order_request->getEnvironment()->getFormURL();	
			return $url . $form_id;
		}
	}
}

