<?php

// function load_css_and_js() {
// 	wp_enqueue_style( 'style', get_stylesheet_uri() );
// }
// add_action( 'wp_enqueue_scripts', 'load_css_and_js', 1001 );

function my_scripts_and_styles(){
	$cache_buster = wp_get_theme()->get('Version');
	wp_enqueue_style( 'adisgladis-style', get_stylesheet_uri(), array(), $cache_buster );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_and_styles', 9999);

function widget_before_shop_init() {
	register_sidebar( array(
		'name'          => 'Widget before shop',
		'id'            => 'widget_before_shop',
	) );
}
add_action( 'widgets_init', 'widget_before_shop_init' );

function widget_before_shop() {
	echo '<div id="widget-before-shop">';
	dynamic_sidebar( 'widget_before_shop' );
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop', 'widget_before_shop' );

function child_remove_parent_function() {
	remove_action( 'woocommerce_archive_description', 'woocommerce_category_image', 0 );
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