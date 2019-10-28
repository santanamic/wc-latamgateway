<?php

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

if ( ! class_exists( 'Wc_LatamGateway_Gateway_Method_General' ) ) {

/**
 * Redirect payment method.
 *
 * @link       https://github.com/latamgateway/woocommerce-plugin
 * @since      1.0.0
 *
 * @package    wc-latamgateway
 * @subpackage wc-latamgateway/includes/gateway/methods/
 * @author     AQUARELA - WILLIAN SANTANA <williansantanamic@gmail.com>
 */
    class Wc_LatamGateway_Gateway_Method_General extends Wc_LatamGateway_Gateway 
    {

    /**
     * Start payment method.
     *
     * @since    1.0.0
     */
        public function __construct() 
        {

        // Define admin set variables.
        $this->id                 = 'wc_latamgateway';
        $this->method_title       = __( 'Latam Gateway', 'wc-latamgateway' );
        $this->method_description = __( 'Pay by credit card, deposit or boleto using Latam Gateway.', 'wc-latamgateway' );
        $this->icon               = plugins_url( 'assets/public/img/logo_horizontal.png', __FILE__ );
        $this->has_fields         = true;
        $this->creditcard         = $this->get_option( 'creditcard' );
        $this->deposit            = $this->get_option( 'deposit' );
        $this->boleto             = $this->get_option( 'boleto' );
		
        parent::init_gateway();
		
        }

    /**
     * Set gateway forms fields ( Plugin admin options ).
     *
     * @access   public
     * @since    1.0.0
     * @return   void
     */

        public function init_form_fields()
        {

        $fields = array(
            'enabled' => array(
                'title'       => __( 'Enable/Disable', 'wc-latamgateway' ),
                'label'       => __( 'Check to enable this form of payment.', 'wc-latamgateway' ),
                'type'        => 'checkbox',
                'description' => '',
                'default'     => 'no'
              ),
            'title' => array(
                'title'       => __( 'Checkout Title', 'wc-latamgateway' ),
                'type'        => 'text',
                'description' => __( 'This controls the title the user sees during checkout.', 'wc-latamgateway' ),
                'default'     => 'Latam Gateway',
                'desc_tip'    => true,
              ),
             'description' => array(
                'title'       => __( 'Checkout Description', 'wc-latamgateway' ),
                'type'        => 'textarea',
                'description' => __( 'This controls the description the user sees during checkout.', 'wc-latamgateway' ),
                'desc_tip'    => true,
                'default'     => __( 'Pay by credit card, deposit or boleto using Latam Gateway.', 'wc-latamgateway' ), 
              ),
             'credentials' => array(
                'title'       => __( 'Integration Settings', 'wc-latamgateway' ),
                'type'        => 'title',
                'description' =>  __( 'Enter your credentials to process payments using Latam Gateway', 'wc-latamgateway' ),
            ),
            'email' => array(
                'title'       => __( 'Email', 'wc-latamgateway' ),
                'type'        => 'email',
                'description' => __( 'Latam Gateway Registration Email', 'wc-latamgateway' ),
                'default'     => '',
                'desc_tip'    => true,
              ),
             'passsword' => array(
                'title'       => __( 'Password', 'wc-latamgateway' ),
                'type'        => 'password',
                'description' =>  __( 'Latam Gateway Registration Password', 'wc-latamgateway' ),
                'desc_tip'    => true,
            ),
             'testmode' => array(
                'title'          => __( 'Sandbox Environment', 'wc-latamgateway' ),
                'type'          => 'checkbox',
                'label'          => __( 'Enable the Latam Gateway Testing', 'wc-latamgateway' ),
                'description' => __( 'Latam Gateway Sandbox can be used to test the payments', 'wc-latamgateway' ),
                'default'     => 'no',
            ),
            'account_key' => array(
                'title'       => __( 'Account Key', 'wc-latamgateway' ),
                'type'        => 'text',
                'description' => __( 'Enter your account key. Contact Latam Gateway Support for Account Key', 'wc-latamgateway' ),
                'default'     => '',
                'desc_tip'    => true,
              ),
            'account_key_sandbox' => array(
                'title'       => 'Account Key for Sandbox',
                'type'        => 'text',
                'description' => __( 'Enter your account key for sandbox. Contact Latam Gateway Support for Account Key', 'wc-latamgateway' ),
                'desc_tip'    => true,
            ),
            'payment_methods' => array(
                'title'       => __( 'Payment Methods', 'wc-latamgateway' ),
                'type'        => 'title',
                'description' => __( 'Select active payment methods at checkout', 'wc-latamgateway' ),
            ),
            'creditcard'            => array(
                'title'   => __( 'Credit Card', 'wc-latamgateway' ),
                'type'    => 'checkbox',
                'label'   => __( 'Enable Credit Card for Redirect Checkout', 'wc-latamgateway' ),
                'default' => 'yes',
            ),
            'deposit'          => array(
                'title'   => __( 'Deposit', 'wc-latamgateway' ),
                'type'    => 'checkbox',
                'label'   => __( 'Enable Deposit for Checkout', 'wc-latamgateway' ),
                'default' => 'yes',
            ),
            'boleto'            => array(
                'title'   => __( 'Boleto', 'wc-latamgateway' ),
                'type'    => 'checkbox',
                'label'   => __( 'Enable Boleto for Transparente Checkout', 'wc-latamgateway' ),
                'default' => 'yes',
            ),
             'additional_fields' => array(
                'title'       => __( 'Additional Fields', 'wc-latamgateway' ),
                'type'        => 'title',
                'description' =>  __( 'Latam Gateway plugin needs some additional fields in checkout.', 'wc-latamgateway' ),
            ),
            'enable_birth_field'            => array(
                'title'   => __( 'Enabled Birth Field', 'wc-latamgateway' ),
                'type'    => 'checkbox',
                'label'   => __( 'Enable Birth Field in Checkout', 'wc-latamgateway' ),
                'default' => 'yes',
            ),
            'required_birth_field' => array(
                'title'   => __( 'Required Birth Field', 'wc-latamgateway' ),
                'type'    => 'checkbox',
                'label'   => __( 'Makes the Birth Field mandatory', 'wc-latamgateway' ),
                'default' => 'yes',
            ),
            'testing'              => array(
                'title'       => __( 'Gateway Testing', 'wc-latamgateway' ),
                'type'        => 'title',
                'description' => '',
            ),
            'debug' => array(
                'title'       => __('Enable Log', 'wc-latamgateway'),
                'type'        => 'checkbox',
                'label'       => __('Enable Log', 'wc-latamgateway'),
                'default'     => 'no',
                'description' => sprintf(__('Logs plugin events through the <code>% s </code> file. Note: This may record personal information. We recommend using this for debugging purposes only and to delete these records after finalization.', 'wc-latamgateway'), \WC_Log_Handler_File::get_log_file_path( $this->id ) ),
              ),
        );

        $this->form_fields = $fields;

        }
        
        
    public function payment_fields() 
    {
    
    $description = $this->get_description();
    
    try {
        $banks = $this->api->list_banks();
    } catch (Exception $e) {
        Wc_LatamGateway_Logger::log( sprintf( __( 'Exception when calling list banks:\r\n %s', 
                'wc-latamgateway' ), $e->getMessage() ) );
    }
    
    if ( $description ) {
        echo wpautop( wptexturize( $description ) ); // WPCS: XSS ok.
    }
    
    $cart_total = $this->get_order_total();
    
    wc_get_template(
        'general-payment-method.php', array(
            'cart_total'       => '100',
            'tc_credit'        => $this->creditcard,
            'tc_deposit'       => $this->deposit,
            'tc_ticket'        => $this->boleto,
            'available_banks'  => $banks->getAvailableBanks(),
            'flag'             => plugins_url( 'assets/public/img/brazilian-flag.png', __FILE__ ),
        ), 'woocommerce/pagseguro/',  WC_LATAMGATEWAY_PATH . 'templates/'
    );
    
    }

    /**
     * Processes the user data after sending the payment request in checkout.    
     *
     * @access   public
     * @since    1.0.0
     * @param    string   $order_id   Current order id.
     * @return   mixed   
     */
        public function process_payment( $order_id ) 
        {
	
        $order = wc_get_order( $order_id );
        $data_request = $_REQUEST;

        Wc_LatamGateway_Logger::log( sprintf(
            __( 'Payment process log for order ID: %s', 'wc-latamgateway' ), $order_id ) );        
        
        Wc_LatamGateway_Logger::log( sprintf(
			__( 'Payment process, get data request: %s', 'wc-latamgateway' ), var_export( $data_request, true ) ) );

        $url_slug = null;
        $payment_method = null;
        $bank_slug = null;
		
        switch ( $data_request['latamgateway_payment_method'] ) {            
            case 'credit-card':            
                $url_slug       = 'LATAMGATEWAY_CREDITCARD_URL';
                $payment_method = \LatamGateway\SDK\Model\Transaction::CREDTCARD;
            break;
            case 'banking-ticket':            
                $url_slug       = 'LATAMGATEWAY_BOLETO_URL';
                $payment_method = \LatamGateway\SDK\Model\Transaction::BOLETO;
            break;
            case 'deposit':            
                $url_slug       = 'LATAMGATEWAY_DEPOSIT_URL';
                $payment_method = \LatamGateway\SDK\Model\Transaction::DEPOSIT;
                $bank_slug      = $data_request['latamgateway_bank_deposit'];
            break;
        }
		
        if (false === $order && 
            filter_var($order->get_meta($url_slug), FILTER_VALIDATE_URL) ) :
           
		   $url_log = sprintf( __( 'Payment URL retrieved: %s', 'wc-latamgateway' ), $url );
            Wc_LatamGateway_Logger::log( $url_log );            
            $url = $order->get_meta($url_slug);
            
			return [ 
                'result'   => 'success', 
                'redirect' => $url
            ];
			
        else :
		
			$customer_birth    = explode( '/', $data_request['billing_birthdate'] );
			if( 3 != count($customer_birth) ){
				wc_add_notice(  _('Fill in the date of birth field for payments with Latam Gateway. Please fill in the field correctly.'), 'error' );
				return 'fail';
			}
            
			$customer_name     = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
            $customer_email    = $order->get_billing_email();
            $customer_document = str_replace(array(',', '.', '-', '/'), '', $order->get_meta('_billing_cpf'));
            $person_type       = $order->get_meta('_billing_persontype');
            $company_document  = str_replace(array(',', '.', '-', '/'), '', $order->get_meta('_billing_cnpj'));
			$document          = $person_type == '1' ? $customer_document : $company_document;
            $customer_phone    = str_replace(array('(', ')', '-', '+', ' '), '', $order->get_billing_phone());
            $order_postback    = WC()->api_request_url( $this->id );
            $order_backurl     = $order->get_checkout_order_received_url();    
            $order_date        = $order->get_date_created()->date("Y-m-d H:i:s");
            $order_value       = str_replace(array(','), '.', $order->get_total());
            $order_items       = $order->get_items();
            
            $this->api->customer->setCode($document);
            $this->api->customer->setName($customer_name);
            $this->api->customer->setDocument($document);
            $this->api->customer->setEmail($customer_email);
            $this->api->customer->setPhone($customer_phone);
            $this->api->customer->setBirth("{$customer_birth[2]}-{$customer_birth[1]}-{$customer_birth[0]}");
           
			$this->api->order->setCode($order_id);
            //$this->api->order->setCode(rand());
            $this->api->order->setRedirectUrl($order_backurl);
            $this->api->order->setNotificationUrl($order_postback);
            $this->api->order->setPurchaseDate($order_date);
            $this->api->order->setValue($order_value);
            $this->api->order->setPaymentMethod($payment_method);
            $this->api->order->setBankSlug($bank_slug);
            
			foreach ($order_items as $item_id => $item_data) {
				
                $product       = $item_data->get_product();
                $product_name  = $product->get_name();
                $item_quantity = $item_data->get_quantity();    
                $product_price = number_format($product->get_price(), 2);  
				
                $this->api->items->setId($item_id);
                $this->api->items->setDescription($product_name);
                $this->api->items->setValue($product_price);
                $this->api->items->setQuantity($item_quantity);
                $this->api->order->setItems($this->api->items);
            }
            
			foreach( $order->get_items( 'shipping' ) as $item_id => $shipping_item_obj ){
                $shipping_method_title       = $shipping_item_obj->get_method_title();
                $shipping_method_total       = $shipping_item_obj->get_total();
                
                $this->api->items->setId($item_id);
                $this->api->items->setDescription($shipping_method_title);
                $this->api->items->setValue($shipping_method_total);
                $this->api->items->setQuantity(1);
                
                $this->api->order->setItems($this->api->items);
            }

		   try {
                $transaction = $this->api->create_order();

				if( ( null !== $transaction->getConfirmationUrl() || 
					  null !== $transaction->getFormId() ) ) {

					if('credit_card' === $payment_method){
						$form_id = $transaction->getFormId();
						$url = $this->api->get_form_url($form_id);
						$latam_id = 'NONE';
					}else{
						$url = $transaction->getConfirmationUrl();
						$latam_id = $transaction->getLatamId();
					}

					Wc_LatamGateway_Logger::log( sprintf(
						__( 'Payment process get transaction data: %s', 'wc-latamgateway' ), var_export($transaction->container, true) ) );
						
					Wc_LatamGateway_Logger::log( sprintf(
						__( 'Payment debug info for order: %s', 'wc-latamgateway' ), var_export( $this->api->order->container, true) ) );

					Wc_LatamGateway_Logger::log( sprintf(
						__( 'Payment debug info for order itens: %s', 'wc-latamgateway' ), var_export( $this->api->items->container, true) ) );
						
					Wc_LatamGateway_Logger::log( sprintf(
						__( 'Payment debug info for order customer: %s', 'wc-latamgateway' ), var_export( $this->api->customer->container, true) ) );

					WC()->cart->empty_cart();
					
					$order->add_meta_data($url_slug, $url, true);
					$order->add_meta_data('LATAMGATEWAY_ID', $latam_id, true);
					$order->update_status( 'on-hold' );
					$order->add_order_note(
						__( 'The buyer has initiated a transaction, but so far Latam Gateway has not received any payment information.', 
						'wc-latamgateway' ));
					$order->save();
					
					return [ 
						'result' => 'success', 
						'redirect' =>  $url 
					];               
				}				
            } catch (Exception $e) {
                Wc_LatamGateway_Logger::log( var_export($e, true) );
                wc_add_notice(  __( 'Error getting payment URL. Try again!', 'wc-latamgateway' ), 'error' );
                return ['result' => 'fail'];
            }
        
		endif;
        
		}

    /**
     * Notification request. Callback API for status changes.
     *
     * @access   public
     * @since    1.0.0
     * @return   void
     */
        public function webhook() 
        {
			
        @ob_clean();

        $all_headers = $_SERVER;
        $all_headers['CONTENT_BODY'] = file_get_contents( 'php://input' );
        
        Wc_LatamGateway_Logger::log( sprintf( __( 'Postback Headers:\r\n %s', 
            'wc-latamgateway' ), var_export( $all_headers, true ) ) );
        
        $content_body = json_decode( $all_headers['CONTENT_BODY'], true );
            
        if( json_last_error() == JSON_ERROR_NONE ) :
        
            if( isset($content_body['latam_id']) && 
				isset($content_body['status']) && 
				isset($content_body['code']) ) :
            
                $postback_latam_id  = $content_body['latam_id'];
                $postback_status = $content_body['status'];
				$order_id = $content_body['code'];
            
            endif;
        
        endif;
        
        if( isset($postback_latam_id) && 
			isset($postback_status) && 
			isset($order_id) ) :

            $start_log = __( 'LatamGateway Gateway received a valid notification URL', 
                'wc-latamgateway' );
            Wc_LatamGateway_Logger::log( $start_log );

            if( (wc_get_order($order_id) instanceof WC_Order) || 
				(wc_get_order($order_id) instanceof WC_Order_Refund) ) :

                $order = wc_get_order( $order_id );
                $order_status = $order->get_status();
                $order_latam_id = $order->get_meta('LATAMGATEWAY_ID');
				
				if( $order_latam_id === $postback_latam_id ) :
				
					switch ( $postback_status ) {
						case 'paid':							
							if ( 'pending' == $order_status 
								|| 'on-hold' == $order_status 
								|| 'created' == $order_status 
								|| 'cancelled' == $order_status ) :

								//wc_reduce_stock_levels( $order_id );

								$order->add_order_note( __( 'A status update has been received. The new order status is: processing', 'wc-latamgateway' ) );
								//$order->add_order_note( __( 'Inventory levels have been reduced' ) );

								$order->update_status('processing', __( 'Payment completed', 'wc-latamgateway' ));
							endif;
						break;
					}
				
				endif;
				
            endif;

        endif;
		
		exit;

        }
        
    /**
     * Check the requirements for run the gateway in checkout    
     *
     * @access   public
     * @since    1.0.0
     * @return   boolean 
     */
        public function is_available()
        {
		
		$available = 'yes' === $this->get_option( 'enabled' ) && ! empty( $this->get_option( 'email' ) ) && ! empty( $this->get_option( 'passsword' )  ) && ( ! empty( $this->get_option( 'account_key' )  ) || ! empty( $this->get_option( 'account_key_sandbox' )  ) );
			
		if ( ! class_exists( 'Extra_Checkout_Fields_For_Brazil' ) ) {
			$available = false;
		}elseif( get_woocommerce_currency() !== 'BRL' ){
			$available = false;
		}elseif( ('yes' !== $this->get_option( 'creditcard' ) && 'yes' !== $this->get_option( 'deposit' ) && 'yes' !== $this->get_option( 'boleto' ) ) ){
			$available = false;
		}
        return $available;

        }

    /**
     * Include dependencies for payment method    
     *
     * @access   public
     * @since    1.0.0
     * @return   void
     */
        public function init_require() 
        {
        require_once( 'includes/functions.php' );

        }

    /**
     * Init hooks.
     *
     * @access   public
     * @since    1.0.0
     * @return   void
     */
        public function init_hooks() 
        {

        // Initial hook for add scripts and styles for payment method.
        add_action( 'admin_enqueue_scripts', 'wc_latamgateway_method_general_admin_enqueue' );
        add_action( 'wp_enqueue_scripts', 'wc_latamgateway_method_general_public_enqueue' );

        // Initial hook for payment method logic.
        add_action( 'woocommerce_api_' . $this->id, array( $this, 'webhook' ) );
        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
        
        }

    }

}
