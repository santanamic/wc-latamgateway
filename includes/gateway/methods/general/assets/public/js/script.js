(function( $ ) {
	'use strict';

	$( function() {

		/**
		 * Initialize the payment form.
		 */
		function latamGatewayInitPaymentForm() {
			latamGatewayHidePaymentMethods();

			$( '#latamgateway-payment-form' ).show();

			latamGatewayShowHideMethodForm( $( '#latamgateway-payment-methods input[type=radio]:checked' ).val() );

			$( '#latamgateway-deposit-form:checked' ).parent( 'label' ).parent( 'li' ).addClass( 'active' );
			
			$( '#latamgateway-deposit-form > ul > li:first-child' ).addClass( 'active').find(' input[type=radio]').click();
		}
		
		/**
		 * Hide payment methods if have only one.
		 */
		function latamGatewayHidePaymentMethods() {
			var paymentMethods = $( '#latamgateway-payment-methods' );

			if ( 1 === $( 'input[type=radio]', paymentMethods ).length ) {
				paymentMethods.hide();
			}
		}
		
		/**
		 * Show/hide the method form.
		 *
		 * @param {string} method
		 */
		function latamGatewayShowHideMethodForm( method ) {
			$( '.latamgateway-method-form' ).hide();
			$( '#latamgateway-payment-methods li' ).removeClass( 'active' );
			$( '#latamgateway-' + method + '-form' ).show();
			$( '#latamgateway-payment-method-' + method ).parent( 'label' ).parent( 'li' ).addClass( 'active' );
		}
		
		latamGatewayInitPaymentForm();
		
		// Update the bank transfer icons classes.
		$( 'body' ).on( 'click', '#latamgateway-deposit-form input[type=radio]', function() {
			$( '#latamgateway-deposit-form li' ).removeClass( 'active' );
			$( this ).parent( 'label' ).parent( 'li' ).addClass( 'active' );
		});

		// Switch the payment method form.
		$( 'body' ).on( 'click', '#latamgateway-payment-methods input[type=radio]', function() {
			latamGatewayShowHideMethodForm( $( this ).val() );
		});
		
		$( 'body' ).on( 'updated_checkout', function() {
			latamGatewayInitPaymentForm();	
		});
		
	});

}( jQuery ));