<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_valid_currency = wc_latamgateway()->environment()->valid_woocommerce_currency();

?>

<?php if( ! $is_valid_currency ) : ?>
<div class="notice notice-info is-dismissible">
	<p><strong><?php _e( 'Latam Gateway Disabled', 'wc-latamgateway' ); ?></strong>: <?php __( 'Currency not supported. Works only with Brazilian Real.', 'wc-latamgateway' ); ?>
	</p>
</div>
<?php endif; ?>