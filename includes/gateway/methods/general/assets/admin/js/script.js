jQuery(function( $ ) {
	'use strict';

	/**
	 * Checkbox ID.
	 */
	var wc_latamgateway_testmode_id = '#woocommerce_wc_latamgateway_testmode';
	var wc_latamgateway_enable_birth_field = '#woocommerce_wc_latamgateway_enable_birth_field';

	/**
	 * Object to handle Cielo admin functions.
	 */
	var wc_latamgateway_admin = {
		isTestMode: function() {
			return $( wc_latamgateway_testmode_id ).is( ':checked' );
		},

		/**
		 * Initialize.
		 */
		init: function() {
			$( document.body ).on( 'change', wc_latamgateway_testmode_id, function() {
				var key_production = $( '#woocommerce_wc_latamgateway_account_key' ).parents( 'tr' ).eq( 0 ),
					key_sandbox = $( '#woocommerce_wc_latamgateway_account_key_sandbox' ).parents( 'tr' ).eq( 0 );
		
				if ( $( this ).is( ':checked' ) ) {
					key_sandbox.show();
					key_production.hide();
				} else {
					key_sandbox.hide();
					key_production.show();
				}
			} );

			$( document.body ).on( 'change', wc_latamgateway_enable_birth_field, function() {
				var required_birth_field = $( '#woocommerce_wc_latamgateway_required_birth_field' ).parents( 'tr' ).eq( 0 );
		
				if ( $( this ).is( ':checked' ) ) {
					required_birth_field.show();
				} else {
					required_birth_field.hide();
				}
			} );

			$( wc_latamgateway_testmode_id  ).change();
			$( wc_latamgateway_enable_birth_field  ).change();
		}
	};

	wc_latamgateway_admin.init();

});