<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$missing_plugins = wc_latamgateway()->environment()->active_required_plugins();

?>

<?php if ( ! empty( $missing_plugins ) ) : ?>
<div class="error">
	<ul>
	<?php foreach($missing_plugins as $key => $plugin) : ?>
		<li><strong><?php esc_html_e( 'Latam Gateway for WooCommerce', 'wc-latamgateway' ); ?></strong> <?php esc_html_e( 'depends on one plugin to work. Please install and enable the following plugin:', 'wc-latamgateway' ); ?> <strong><a href="<?php echo $plugin['url']; ?>"><?php echo $plugin['name']; ?></a></strong></li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>

