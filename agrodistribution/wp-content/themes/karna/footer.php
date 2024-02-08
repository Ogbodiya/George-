<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * karna_before_footer hook.
 *
 */
do_action( 'karna_before_footer' );
?>

<div <?php karna_footer_class(); ?>>
	<?php
	/**
	 * karna_before_footer_content hook.
	 *
	 */
	do_action( 'karna_before_footer_content' );

	/**
	 * karna_footer hook.
	 *
	 *
	 * @hooked karna_construct_footer_widgets - 5
	 * @hooked karna_construct_footer - 10
	 */
	do_action( 'karna_footer' );

	/**
	 * karna_after_footer_content hook.
	 *
	 */
	do_action( 'karna_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * karna_after_footer hook.
 *
 */
do_action( 'karna_after_footer' );

wp_footer();
?>

</body>
</html>
