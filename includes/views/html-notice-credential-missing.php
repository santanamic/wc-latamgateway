<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = get_option( 'woocommerce_wc_latamgateway_settings' );

?>
<?php if( empty( $settings['email'] ) ) : ?>
<div class="notice notice-info is-dismissible">
	<p><strong><?php _e( 'Latam Gateway Disabled', 'wc-latamgateway' ); ?></strong>: <?php _e( 'You must enter your "Latam Gateway" login email in the settings.', 'wc-latamgateway' ); ?>
	</p>
</div>
<?php endif; if( empty( $settings['passsword'] ) ) : ?>
<div class="notice notice-info is-dismissible">
	<p><strong><?php _e( 'Latam Gateway Disabled', 'wc-latamgateway' ); ?></strong>: <?php _e( 'You must enter your "Latam Gateway" login passsword in the settings.', 'wc-latamgateway' ); ?>
	</p>
</div>
<?php endif; if( 'yes' !== $settings['testmode'] && empty( $settings['account_key'] ) ) : ?>
<div class="notice notice-info is-dismissible">
	<p><strong><?php _e( 'Latam Gateway Disabled', 'wc-latamgateway' ); ?></strong>: <?php _e( 'You must enter your account key in the settings.', 'wc-latamgateway' ); ?>
	</p>
</div>
<?php elseif( 'yes' === $settings['testmode'] && empty( $settings['account_key_sandbox'] ) ) : ?>
<div class="notice notice-info is-dismissible">
	<p><strong><?php _e( 'Latam Gateway Disabled', 'wc-latamgateway' ); ?></strong>: <?php _e( 'You must enter your sandbox account key in the settings.', 'wc-latamgateway' ); ?>
	</p>
</div>
<?php endif; ?>