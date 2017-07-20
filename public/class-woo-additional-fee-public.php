<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Additional_Fee
 * @subpackage Woo_Additional_Fee/public
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class Woo_Additional_Fee_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Woo_Additional_Fee    The ID of this plugin.
	 */
	private $Woo_Additional_Fee;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Woo_Additional_Fee       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Woo_Additional_Fee, $version ) {

		$this->Woo_Additional_Fee = $Woo_Additional_Fee;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function wooaf_add_additional_fee(){
		
		global $woocommerce;
		
		$wooaf_text = get_option( '_wooaf_additional_fee_label_text', $wooaf_additional_fee_label );
		$wooaf_amount = get_option( '_wooaf_additional_fee_amount', $wooaf_additional_fee_amount );
		
		if(!empty($wooaf_text) && !empty($wooaf_amount) ){
	 		$woocommerce->cart->add_fee( __($wooaf_text, 'woocommerce'), (float)$wooaf_amount );	
		}
		
	}
	

}
