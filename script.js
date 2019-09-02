
// https://gist.github.com/pierrewiberg/76679a1205d4718f80c01a98552e0f87
jQuery(document).ready(function() {
	jQuery( ".variations_form" ).on( "woocommerce_update_variation_values", function () {
		let jQueryswatches = jQuery('.tawcvs-swatches');
		jQueryswatches.find('.swatch').removeClass('out-of-stock');
		jQueryswatches.each(function(){
			let jQueryselect = jQuery(this).prev().find('select');
			jQuery(this).find('.swatch').each(function(){
				if (!(jQueryselect.find('option[value="'+ jQuery(this).attr('data-value') +'"]').length > 0)) {
					jQuery(this).addClass('out-of-stock');
				}
			})
		})
	});
});