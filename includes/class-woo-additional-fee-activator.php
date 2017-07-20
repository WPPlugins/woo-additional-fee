<?php 
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Woo_Additional_Fee
 * @subpackage Woo_Additional_Fee/includes
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class Woo_Additional_Fee_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		global $wpdb,$woocommerce;
		
		if( !in_array( 'woocommerce/woocommerce.php',apply_filters('active_plugins',get_option('active_plugins'))) && !is_plugin_active_for_network( 'woocommerce/woocommerce.php' )   ) { 
			wp_die( "<strong>Woo Additional Fee</strong> plugin requires <a href='".esc_url('https://wordpress.org/plugins/woocommerce')."' target='_blank'><strong>WooCommerce</strong></a>. Go back to <a href='".get_admin_url(null, 'plugins.php')."'>Plugins Page</a>." );
		} else {
			update_option('wooaf_activated_on',@date('d-m-Y h:i:s'));
		}

	}

}
