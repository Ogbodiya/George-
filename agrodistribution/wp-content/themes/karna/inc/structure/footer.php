<?php
/**
 * Footer elements.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'karna_construct_footer' ) ) {
	add_action( 'karna_footer', 'karna_construct_footer' );
	/**
	 * Build our footer.
	 *
	 */
	function karna_construct_footer() {
		?>
		<footer class="site-info" itemtype="https://schema.org/WPFooter" itemscope="itemscope">
			<div class="inside-site-info <?php if ( 'full-width' !== karna_get_setting( 'footer_inner_width' ) ) : ?>grid-container grid-parent<?php endif; ?>">
				<?php
				/**
				 * karna_before_copyright hook.
				 *
				 *
				 * @hooked karna_footer_bar - 15
				 */
				do_action( 'karna_before_copyright' );
				?>
				<div class="copyright-bar">
					<?php
					/**
					 * karna_credits hook.
					 *
					 *
					 * @hooked karna_add_footer_info - 10
					 */
					do_action( 'karna_credits' );
					?>
				</div>
			</div>
		</footer><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'karna_footer_bar' ) ) {
	add_action( 'karna_before_copyright', 'karna_footer_bar', 15 );
	/**
	 * Build our footer bar
	 *
	 */
	function karna_footer_bar() {
		if ( ! is_active_sidebar( 'footer-bar' ) ) {
			return;
		}
		?>
		<div class="footer-bar">
			<?php dynamic_sidebar( 'footer-bar' ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'karna_add_footer_info' ) ) {
	add_action( 'karna_credits', 'karna_add_footer_info' );
	/**
	 * Add the copyright to the footer
	 *
	 */
	function karna_add_footer_info() {
		$copyright = sprintf( '<span class="copyright">&copy; %1$s %2$s</span> &bull; %4$s <a href="%3$s" itemprop="url">%5$s</a>',
			esc_html( date( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) ),
			esc_url( KARNA_THEME_URL ),
			esc_html_x( 'Powered by', 'WPKoi', 'karna' ),
			esc_html__( 'WPKoi', 'karna' )
		);

		echo apply_filters( 'karna_copyright', $copyright ); // WPCS: XSS ok.
	}
}

/**
 * Build our individual footer widgets.
 * Displays a sample widget if no widget is found in the area.
 *
 *
 * @param int $widget_width The width class of our widget.
 * @param int $widget The ID of our widget.
 */
function karna_do_footer_widget( $widget_width, $widget ) {
	$widget_width = apply_filters( "karna_footer_widget_{$widget}_width", $widget_width );
	$tablet_widget_width = apply_filters( "karna_footer_widget_{$widget}_tablet_width", '50' );
	?>
	<div class="footer-widget-<?php echo absint( $widget ); ?> grid-parent grid-<?php echo absint( $widget_width ); ?> tablet-grid-<?php echo absint( $tablet_widget_width ); ?> mobile-grid-100">
		<?php if ( ! dynamic_sidebar( 'footer-' . absint( $widget ) ) ) :
	        $current_user = wp_get_current_user();
	        if (user_can( $current_user, 'administrator' )) { ?>
			<aside class="widget inner-padding widget_text">
				<h4 class="widget-title"><?php esc_html_e( 'Footer Widget', 'karna' );?></h4>
				<div class="textwidget">
					<p>
						<?php esc_html_e( 'Replace this widget content by going to ', 'karna' ); ?><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><strong><?php esc_html_e('Appearance / Widgets', 'karna' ); ?></strong></a><?php esc_html_e( ' and dragging widgets into this widget area.', 'karna' ); ?>
					</p>
					<p>
						<?php esc_html_e( 'To remove or choose the number of footer widgets, go to ', 'karna' ); ?><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><strong><?php esc_html_e('Appearance / Customize / Layout / Footer Widgets', 'karna' ); ?></strong></a><?php esc_html_e( '.', 'karna' ); ?>
					</p>
				</div>
			</aside>
		<?php } endif; ?>
	</div>
	<?php
}

if ( ! function_exists( 'karna_construct_footer_widgets' ) ) {
	add_action( 'karna_footer', 'karna_construct_footer_widgets', 5 );
	/**
	 * Build our footer widgets.
	 *
	 */
	function karna_construct_footer_widgets() {
		// Get how many widgets to show.
		$widgets = karna_get_footer_widgets();

		if ( ! empty( $widgets ) && 0 !== $widgets ) :

			// Set up the widget width.
			$widget_width = '';
			if ( $widgets == 1 ) {
				$widget_width = '100';
			}

			if ( $widgets == 2 ) {
				$widget_width = '50';
			}

			if ( $widgets == 3 ) {
				$widget_width = '33';
			}

			if ( $widgets == 4 ) {
				$widget_width = '25';
			}

			if ( $widgets == 5 ) {
				$widget_width = '20';
			}
			?>
			<div id="footer-widgets" class="site footer-widgets">
				<div <?php karna_inside_footer_class(); ?>>
					<div class="inside-footer-widgets">
						<?php
						if ( $widgets >= 1 ) {
							karna_do_footer_widget( $widget_width, 1 );
						}

						if ( $widgets >= 2 ) {
							karna_do_footer_widget( $widget_width, 2 );
						}

						if ( $widgets >= 3 ) {
							karna_do_footer_widget( $widget_width, 3 );
						}

						if ( $widgets >= 4 ) {
							karna_do_footer_widget( $widget_width, 4 );
						}

						if ( $widgets >= 5 ) {
							karna_do_footer_widget( $widget_width, 5 );
						}
						?>
					</div>
				</div>
			</div>
		<?php
		endif;

		/**
		 * karna_after_footer_widgets hook.
		 *
		 */
		do_action( 'karna_after_footer_widgets' );
	}
}

if ( ! function_exists( 'karna_back_to_top' ) ) {
	add_action( 'karna_after_footer', 'karna_back_to_top', 2 );
	/**
	 * Build the back to top button
	 *
	 */
	function karna_back_to_top() {
		$karna_settings = wp_parse_args(
			get_option( 'karna_settings', array() ),
			karna_get_defaults()
		);

		if ( 'enable' !== $karna_settings[ 'back_to_top' ] ) {
			return;
		}

		echo apply_filters( 'karna_back_to_top_output', sprintf( // WPCS: XSS ok.
			'<a title="%1$s" rel="nofollow" href="#" class="karna-back-to-top" style="opacity:0;visibility:hidden;" data-scroll-speed="%2$s" data-start-scroll="%3$s">
				<span class="screen-reader-text">%5$s</span>
			</a>',
			esc_attr__( 'Scroll back to top', 'karna' ),
			absint( apply_filters( 'karna_back_to_top_scroll_speed', 400 ) ),
			absint( apply_filters( 'karna_back_to_top_start_scroll', 300 ) ),
			esc_attr( apply_filters( 'karna_back_to_top_icon', 'fa-angle-up' ) ),
			esc_html__( 'Scroll back to top', 'karna' )
		) );
	}
}

add_action( 'karna_after_footer', 'karna_side_padding_footer', 5 );
/**
 * Add holder div if sidebar padding is enabled
 *
 */
function karna_side_padding_footer() { 
	$karna_settings = wp_parse_args(
		get_option( 'karna_spacing_settings', array() ),
		karna_spacing_get_defaults()
	);
	
	$fixed_side_content   =  karna_get_setting( 'fixed_side_content' ); 
	$socials_display_side =  karna_get_setting( 'socials_display_side' ); 
	
	if ( ( $karna_settings[ 'side_top' ] != 0 ) || ( $karna_settings[ 'side_right' ] != 0 ) || ( $karna_settings[ 'side_bottom' ] != 0 ) || ( $karna_settings[ 'side_left' ] != 0 ) ) { ?>
    	<div class="karna-side-left-cover"></div>
    	<div class="karna-side-right-cover"></div>
	</div>
	<?php } 
	if ( ( $fixed_side_content != '' ) || ( $socials_display_side == true ) ) { ?>
    <div class="karna-side-left-content">
        <?php if ( $socials_display_side == true ) { ?>
        <div class="karna-side-left-socials">
        <?php do_action( 'karna_social_bar_action' ); ?>
        </div>
        <?php } ?>
        <?php if ( $fixed_side_content != '' ) { ?>
    	<div class="karna-side-left-text">
        <?php echo wp_kses_post( $fixed_side_content ); ?>
        </div>
        <?php } ?>
    </div>
    <?php
	}
}
