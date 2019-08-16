<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmapress
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<?php bulmapress_skip_link_screen_reader_text(); ?>
		<header id="header" class="desktop">
			<?php if( get_theme_mod( 'wetail_theme_topbar_left_text' ) || ( get_theme_mod( 'wetail_theme_topbar_right_text' ))) { ?> 
			<div class="topbar">
				<?php echo do_shortcode( get_theme_mod( 'wetail_theme_topbar_left_text' ) ); ?>
			</div>
			<?php } ?>
			<nav id="site-navigation" class="navbar" role="navigation">

				<div class="nav-left navbar-menu mobile">
					<a href="nav-menu" class="mobile-nav"><i class="fal fa-bars"></i></a>
				</div>
				<div class="nav-left navbar-menu desktop">
					<?php bulmapress_navigation(); ?>
				</div>
				<div class="nav-center branding">
					<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<a href="'. get_home_url() .'"><img src="'. esc_url( $logo[0] ) .'" alt="' . get_bloginfo('name') . ' - ' . get_bloginfo('description') . '" title="' . get_bloginfo('name') . ' - ' . get_bloginfo('description') . '"></a>';
					} elseif(is_user_logged_in()) {
						echo '<a class="button customize_items" href="'. admin_url( '/customize.php?autofocus[section]=title_tagline' ) .'">' . __('Add logo', 'supernova_theme') . '</a>';
					} else {
						echo '<h1 title="' . get_bloginfo('name') . ' - ' . get_bloginfo('description') . '">'. bulmapress_home_link('nav-item is-brand') .'</h1>';
						echo '<p>'. bulmapress_blog_description('nav-item is-muted') .'</p>';
					} ?>
				</div>
                    <?php secondary_navigation(); ?>
				<div class="nav-shop">
					<div class="nav-search">
						<?php get_product_search_form(); ?>
					</div>
					<ul class="shop-items">
						<li class="nav-item">
							<a class="toggle-search" href="#"><i class="far fa-search"></i></a>
						</li>
						<li class="nav-item toggle-cart">
							<a class="menu-link" href="#">
								<i class="far fa-shopping-bag"></i>
								<span class="minicart_count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
							</a>
						</li>
					<ul>
				</div>
			</nav>
		</header>
		<div id="content" class="site-content">