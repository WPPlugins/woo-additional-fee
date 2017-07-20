jQuery(document).ready(function(e) {
	
	jQuery("#SaveWooCFData").click(function(e) {
		
		var err = 0;
		var wooaf_additional_fee_label = jQuery("#wooaf_additional_fee_label").val();
		var wooaf_additional_fee_amount = jQuery("#wooaf_additional_fee_amount").val();
		var wooaf_nonce = jQuery("#wooaf_nonce").val();
		
		jQuery("input.req").each(function(index, element) {
            if(jQuery(this).val().length == 0){
				jQuery(this).css("border","1px solid #cc0000");
				err++;
			}else{
				jQuery(this).css("border","1px solid #ddd");
			}
        });		
		
		if(!jQuery.isNumeric(wooaf_additional_fee_amount)){
			jQuery("#wooaf_additional_fee_amount").css("border","1px solid #cc0000");
			jQuery("#ErrMsg").text("Please enter numeric value. e.g. 12 or 12.50");
			err++;
		}else{
			jQuery("#ErrMsg").text("");
			}
		
		if(err == 0){
		 jQuery.ajax({
			 type : "post",
			 dataType : "json",
			 url : wooafAjax.ajaxurl,
			 data : {action: "save_wooaf_value", wooaf_additional_fee_label : wooaf_additional_fee_label, wooaf_additional_fee_amount: wooaf_additional_fee_amount, wooaf_nonce: wooaf_nonce},
			 success: function(response) {
				jQuery(".wooaf_message").show();
				jQuery('#wooaf_form')[0].reset();
				jQuery("#WooAF_Text_Preview strong").text(wooaf_additional_fee_label);
				jQuery("#WooAF_Amount_Preview strong").text(wooaf_additional_fee_amount);
				window.location=wooafAjax.wooafurl+'&res=suc';
			 }
		  })   
		}else{}
		
    });
});