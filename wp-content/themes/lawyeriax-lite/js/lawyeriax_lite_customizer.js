jQuery(document).ready(function() {
	/* Show control for frontpage template */

	var lawyeriax_lite_static_page_id = jQuery('#customize-control-page_on_front select').val();

	if( (typeof lawyeriax_lite_static_page_id != "undefined") && (lawyeriax_lite_static_page_id != '0') ) {
		jQuery('#customize-control-lawyeriax_lite_frontpage_template_static').css('display','block');
	}
	else {
		jQuery('#customize-control-lawyeriax_lite_frontpage_template_static').css('display','none');
	}

	jQuery('#customize-control-page_on_front select').change(function() { // When a frontpage is selected

		var lawyeriax_lite_selected_fp = jQuery(this).find('option:selected');

		if(( typeof lawyeriax_lite_selected_fp != 'undefined' ) && ( typeof lawyeriax_lite_selected_fp.attr("template") != 'undefined' )) {

			jQuery('#customize-control-lawyeriax_lite_frontpage_template_static select').val(lawyeriax_lite_selected_fp.attr("template"));
			jQuery('#customize-control-lawyeriax_lite_frontpage_template_static select option[selected="selected"]').removeAttr("selected");
			jQuery('#customize-control-lawyeriax_lite_frontpage_template_static select option[value="'+lawyeriax_lite_selected_fp.attr("template")+'"]').attr("selected","selected");
			jQuery('#customize-control-lawyeriax_lite_frontpage_template_static select option[value="'+lawyeriax_lite_selected_fp.attr("template")+'"]').trigger('change');
		}

		if ( (typeof this.value != "undefined") && (this.value != '0') ) {
			jQuery('#customize-control-lawyeriax_lite_frontpage_template_static').css('display','block');
		}
		else {
			jQuery('#customize-control-lawyeriax_lite_frontpage_template_static').css('display','none');
		}

	});

});