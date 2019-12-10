<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<fieldset id="latamgateway-payment-form" class="<?php echo 'storefront' === basename( get_template_directory() ) ? 'wc-latamgateway-form-storefront' : ''; ?>" data-cart_total="<?php echo esc_attr( number_format( $cart_total, 2, '.', '' ) ); ?>">

	<ul id="latamgateway-payment-methods">
		<?php if ( 'yes' == $tc_credit ) : ?>
		<li><label><input id="latamgateway-payment-method-credit-card" type="radio" name="latamgateway_payment_method" value="credit-card" <?php checked( true, ( 'yes' == $tc_credit ), true ); ?> /> <?php _e( 'Credit Card', 'wc-latamgateway' ); ?></label></li>
		<?php endif; ?>

		<?php if ( 'yes' == $tc_ticket ) : ?>
		<li><label><input id="latamgateway-payment-method-banking-ticket" type="radio" name="latamgateway_payment_method" value="banking-ticket" <?php checked( true, ( 'no' == $tc_credit && 'no' == $tc_deposit && 'yes' == $tc_ticket ), true ); ?> /> <?php _e( 'Banking Boleto', 'wc-latamgateway' ); ?></label></li>
		<?php endif; ?>
		
		<?php if ( 'yes' == $tc_deposit ) : ?>
		<li><label><input id="latamgateway-payment-method-deposit" type="radio" name="latamgateway_payment_method" value="deposit" <?php checked( true, ( 'no' == $tc_credit && 'yes' == $tc_deposit ), true ); ?> /> <?php _e( 'Bank Deposit', 'wc-latamgateway' ); ?></label></li>
		<?php endif; ?>
	</ul>
	<div class="clear"></div>

	<?php if ( 'yes' == $tc_credit ) : ?>
		<div id="latamgateway-credit-card-form" class="latamgateway-method-form">
			<br>
			<p><?php _e( 'By clicking "Place Order" you will be taken to the secure Latam Gateway environment to finalize the payment, where you can add card details and choose the number of installments.', 'wc-latamgateway' ); ?></p>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' == $tc_deposit ) : ?>
		<div id="latamgateway-deposit-form" class="latamgateway-method-form">
			<br>
			<?php if( ! empty($available_banks) && is_array($available_banks) ): ?>
			<ul>
				<?php foreach($available_banks as $bank): ?>
					<li><label><input type="radio" name="latamgateway_bank_deposit" value="<?php echo $bank['slug']; ?>" /><img src="<?php echo $bank['asset_url'] ?? $bank['logo_url']; ?>"/><span><?php echo $bank['name']; ?></span></label></li>
				<?php endforeach; ?>
			</ul>
			<p><?php _e( 'Select a bank and After click in "Place order", you will have access to our bank details so that you can pay safely.', 'wc-latamgateway' ); ?></p>				
			<?php else: ?>
				<p><?php _e( 'The store has no registered banks. Please contact the webiste administrator.', 'wc-latamgateway' ); ?></p>			
				<?php endif; ?>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' == $tc_ticket ) : ?>
		<div id="latamgateway-banking-ticket-form" class="latamgateway-method-form">
			<br>
			<span><i id="latamgateway-icon-ticket"></i></span>
			<p>
			<?php _e( 'The order will be confirmed only after the payment approval.', 'wc-latamgateway' ); ?><br>
			<?php _e( 'After clicking "Place order" you will have access to banking ticket which you can print and pay in your internet banking or in a lottery retailer.', 'wc-latamgateway' ); ?></p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>
		<br>
	<p><?php esc_html_e( 'This purchase is being made in Brazil', 'wc-latamgateway' ); ?> <img src="<?php echo esc_url( $flag ); ?>" alt="<?php esc_attr_e( 'Brazilian flag', 'wc-latamgateway' ); ?>" style="position: relative; display: inline; float: none; vertical-align: middle; border: none;" /></p>

</fieldset>