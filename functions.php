<?php

function child_remove_parent_function() {
	remove_action( 'woocommerce_archive_description', 'woocommerce_category_image' );
}
add_action( 'wp_loaded', 'child_remove_parent_function' );

add_action( 'woocommerce_archive_description', 'adisgladis_woocommerce_category_image', 0 );
function adisgladis_woocommerce_category_image() {
	if ( is_product_category() ){
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		?>

		<div class="category-header">
		<?php if ( $image ) { ?>
			<img class="category-image" src="<?php echo $image ?>">
		<?php } else { ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php } ?>
		</div>

		<?php
	}
}
?>