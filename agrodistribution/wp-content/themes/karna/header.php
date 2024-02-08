<?php
/**
 * The template for displaying the header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php karna_body_schema();?> <?php body_class(); ?>>
	<?php
	/**
	 * new WordPress action since version 5.2
	 */
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	
	/**
	 * karna_before_header hook.
	 *
	 *
	 * @hooked karna_do_skip_to_content_link - 2
	 * @hooked karna_top_bar - 5
	 * @hooked karna_add_navigation_before_header - 5
	 */
	do_action( 'karna_before_header' );

	/**
	 * karna_header hook.
	 *
	 *
	 * @hooked karna_construct_header - 10
	 */
	do_action( 'karna_header' );

	/**
	 * karna_after_header hook.
	 *
	 *
	 * @hooked karna_featured_page_header - 10
	 */
	do_action( 'karna_after_header' );
	?>

	<div id="page" class="hfeed site grid-container container grid-parent">
		<div id="content" class="site-content">
			<?php
			/**
			 * karna_inside_container hook.
			 *
			 */
			do_action( 'karna_inside_container' );
