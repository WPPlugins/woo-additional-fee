<?php
/**
 * Plugin Name:       Woo Additional Fee
 * Plugin URI:        http://nilaypatel.info
 * Description:       This plugin allows merchant to add an additional cart fee to the cart by adding custom fee label and amount of fee. 
 * Version:           1.0.0
 * Author:            Nilay Patel
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-additional-fee
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-additional-fee-activator.php
 */
function activate_Woo_Additional_Fee() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-additional-fee-activator.php';
	Woo_Additional_Fee_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-additional-fee-deactivator.php
 */
function deactivate_Woo_Additional_Fee() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-additional-fee-deactivator.php';
	Woo_Additional_Fee_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Woo_Additional_Fee' );
register_deactivation_hook( __FILE__, 'deactivate_Woo_Additional_Fee' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-additional-fee.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Woo_Additional_Fee() {

	$plugin = new Woo_Additional_Fee();
	$plugin->run();

}
run_Woo_Additional_Fee();
