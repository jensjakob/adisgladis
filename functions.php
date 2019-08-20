<?php

function child_remove_parent_function() {
	remove_action( 'woocommerce_archive_description', 'woocommerce_category_image', 0 );
}
add_action( 'wp_loaded', 'child_remove_parent_function' );

?>