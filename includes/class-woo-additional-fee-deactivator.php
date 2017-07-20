<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Woo_Additional_Fee
 * @subpackage Woo_Additional_Fee/includes
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class Woo_Additional_Fee_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option('wooaf_activated_on');
		delete_option('wooaf_deactivated_on');
		delete_option('_wooaf_additional_fee_amount');
		delete_option('_wooaf_additional_fee_label_text');
	}

}
