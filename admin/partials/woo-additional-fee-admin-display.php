<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @package    Woo_Additional_Fee
 * @subpackage Woo_Additional_Fee/admin/partials
 */
 
function woo_additional_fee_admin_area(){
	
	global  $woocommerce;
	
	$nonce = wp_create_nonce("save_wooaf_value");
	$wooaf_text = get_option( '_wooaf_additional_fee_label_text', $wooaf_additional_fee_label );
	$wooaf_amount = get_option( '_wooaf_additional_fee_amount', $wooaf_additional_fee_amount );
	
	?>	
    <h2 class="wooaf_main_title"><?php echo __('Woo Additional Fee','wooaf'); ?></h2>
    <div class="wooaf_main">
    	<h4><?php echo __('Here you can set the additonal fee label and amount that will apply on the cart at time of checkout.','wooaf'); ?></h4>
        <?php if($_REQUEST['res'] == 'suc'){ ?>
        <div class="wooaf_message"><div id="message" class="updated notice notice-success is-dismissible"><p><?php echo __('Saved Successfully.','wooaf'); ?></p><button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo __('Dismiss this notice.','wooaf'); ?></span></button></div></div>
        <?php } ?>
		<div class="wooaf_left">	
	        <form name="wooaf_form" id="wooaf_form">
                <input type="hidden" name="wooaf_nonce" id="wooaf_nonce" value="<?php echo $nonce; ?>" />
                 <h3><?php echo __('Add / Edit Additional fee for your WooCommerce Cart / Checkout','wooaf'); ?></h3>
                <table class="widefat" width="50%">
                    <tr>
                        <td width="30%"><?php echo __('<strong>Add Custom Fee Label:</strong>','wooaf'); ?></td>
                        <td><input type="text" placeholder="<?php echo __('Add label for additional fee','wooaf'); ?>" name="wooaf_additional_fee_label" class="req" id="wooaf_additional_fee_label" /></td>
                    </tr>
                    <tr>
                        <td width="30%"><?php echo __('<strong>Add Custom Fee Amount:</strong><br/><em>In '.get_woocommerce_currency_symbol().'</em>','wooaf'); ?></td>
                        <td><input type="text" name="wooaf_additional_fee_amount" placeholder="<?php echo __('Add additional fee amount e.g. 12 or 12.50','wooaf'); ?>" class="req" id="wooaf_additional_fee_amount" /><span id="ErrMsg"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input type="button" class="button button-primary" id="SaveWooCFData" name="SaveWooCFData" value="Save"></td>
                    </tr>
                </table>
            </form>
    	</div>
        <div class="wooaf_right">	
        <h3><?php echo __('Current values for Additional Fee','wooaf'); ?></h3>
        <table class="widefat" width="50%">
        <?php
        if(!empty($wooaf_text) && !empty($wooaf_amount) ){
		?>	
            <tr>
                <td width="40%"><?php echo __('Current Custom Fee Label Text:','wooaf'); ?></td>
                <td id="WooAF_Text_Preview"><strong><?php echo __(get_option('_wooaf_additional_fee_label_text'),'wooaf'); ?></strong></td>
            </tr>
            <tr>
                <td width="40%"><?php echo __('Current Custom Fee Amount <em>(In '.get_woocommerce_currency_symbol().')</em>:','wooaf'); ?></td>
                <td id="WooAF_Amount_Preview"><strong><?php echo __(get_option('_wooaf_additional_fee_amount'),'wooaf'); ?></strong></td>
            </tr>
        <?php  } else{ ?>
        	<tr>
                <td colspan="2"><strong><?php echo __('You did not set any additonal fee for your cart yet.','wooaf'); ?></strong></td>
            </tr>
        <?php } ?>
        </table>
        </div>
    </div>
    <?php	
}
?>

