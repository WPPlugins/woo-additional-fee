<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Additional_Fee
 * @subpackage Woo_Additional_Fee/admin
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class Woo_Additional_Fee_Admin {

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
	 * @param      string    $Woo_Additional_Fee       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Woo_Additional_Fee, $version ) {

		$this->Woo_Additional_Fee = $Woo_Additional_Fee;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woo_Additional_Fee_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Additional_Fee_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Woo_Additional_Fee, plugin_dir_url( __FILE__ ) . 'css/woo-additional-fee-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woo_Additional_Fee_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Additional_Fee_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_register_script( "wooaf_ajax_data", plugin_dir_url( __FILE__ ) . 'js/woo-additional-fee-admin.js', array('jquery'), $this->version, false );
   		 wp_localize_script( 'wooaf_ajax_data', 'wooafAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'wooafurl' => menu_page_url("woo_additional_fee_admin_area",false)));   
		 wp_enqueue_script( 'wooaf_ajax_data' );
		 
	}
	
	
	public function add_admin_menu() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woo_Additional_Fee_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Additional_Fee_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_menu_page( 'Woo Additional Fee', 'Woo Additional Fee', 'manage_options', 'woo_additional_fee_admin_area', 'woo_additional_fee_admin_area', plugins_url( '/woo-additional-fee/admin/css/wooaf_ico.png' ), 110 ); 
		
		require_once 'partials/woo-additional-fee-admin-display.php';

	}
	
	public function save_wooaf_form_data(){

		if ( !wp_verify_nonce( $_REQUEST['wooaf_nonce'], "save_wooaf_value")) {
		  exit("You are not authorize to stay here.");
		} 
		
		$wooaf_additional_fee_label = sanitize_text_field($_REQUEST['wooaf_additional_fee_label']);
		$wooaf_additional_fee_amount = $_REQUEST['wooaf_additional_fee_amount']; 
		
		update_option( '_wooaf_additional_fee_label_text', $wooaf_additional_fee_label );
		update_option( '_wooaf_additional_fee_amount', $wooaf_additional_fee_amount );
		
	}
	
	public function force_login(){
	  echo "Only admin user can save the data";
	  die();	
	
	}
	
}
