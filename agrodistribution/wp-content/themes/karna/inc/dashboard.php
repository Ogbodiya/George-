<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'karna_create_menu' ) ) {
	add_action( 'admin_menu', 'karna_create_menu' );
	/**
	 * Adds our "Karna" dashboard menu item
	 *
	 */
	function karna_create_menu() {
		$karna_page = add_theme_page( 'Karna', 'Karna', apply_filters( 'karna_dashboard_page_capability', 'edit_theme_options' ), 'karna-options', 'karna_settings_page' );
		add_action( "admin_print_styles-$karna_page", 'karna_options_styles' );
	}
}

if ( ! function_exists( 'karna_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Karna dashboard page
	 *
	 */
	function karna_options_styles() {
		wp_enqueue_style( 'karna-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), KARNA_VERSION );
	}
}

if ( ! function_exists( 'karna_settings_page' ) ) {
	/**
	 * Builds the content of our Karna dashboard page
	 *
	 */
	function karna_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="karna-masthead clearfix">
					<div class="karna-container">
						<div class="karna-title">
							<a href="<?php echo esc_url(KARNA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Karna', 'karna' ); ?></a> <span class="karna-version"><?php echo esc_html( KARNA_VERSION ); ?></span>
						</div>
						<div class="karna-masthead-links">
							<?php if ( ! defined( 'KARNA_PREMIUM_VERSION' ) ) : ?>
								<a class="karna-masthead-links-bold" href="<?php echo esc_url(KARNA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'karna' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(KARNA_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'karna' ); ?></a>
                            <a href="<?php echo esc_url(KARNA_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'karna' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * karna_dashboard_after_header hook.
				 *
				 */
				 do_action( 'karna_dashboard_after_header' );
				 ?>

				<div class="karna-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * karna_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'karna_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'karna-settings-group' ); ?>
									<?php do_settings_sections( 'karna-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="karna_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'karna' )
										);
										?>
									</div>

									<?php
									/**
									 * karna_inside_options_form hook.
									 *
									 */
									 do_action( 'karna_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => KARNA_THEME_URL,
									),
									'Blog' => array(
											'url' => KARNA_THEME_URL,
									),
									'Colors' => array(
											'url' => KARNA_THEME_URL,
									),
									'Copyright' => array(
											'url' => KARNA_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => KARNA_THEME_URL,
									),
									'Demo Import' => array(
											'url' => KARNA_THEME_URL,
									),
									'Hooks' => array(
											'url' => KARNA_THEME_URL,
									),
									'Import / Export' => array(
											'url' => KARNA_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => KARNA_THEME_URL,
									),
									'Page Header' => array(
											'url' => KARNA_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => KARNA_THEME_URL,
									),
									'Spacing' => array(
											'url' => KARNA_THEME_URL,
									),
									'Typography' => array(
											'url' => KARNA_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => KARNA_THEME_URL,
									)
								);

								if ( ! defined( 'KARNA_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox karna-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'karna' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated karna-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'karna' ); ?></a>
													</div>
												</div>
												<div class="karna-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * karna_options_items hook.
								 *
								 */
								do_action( 'karna_options_items' );
								?>
							</div>

							<div class="karna-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="karna_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'karna' )
									);
									?>
								</div>

								<?php
								/**
								 * karna_admin_right_panel hook.
								 *
								 */
								 do_action( 'karna_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Karna documentation', 'karna' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'karna' ); ?></p>
                                    <a href="<?php echo esc_url(KARNA_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Karna documentation', 'karna' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'karna' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'karna' ); ?></p>
                                    <a href="<?php echo esc_url(KARNA_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'karna' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'karna' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Karna theme, show it to the world with Your review. Your feedback helps a lot.', 'karna' ); ?></p>
                                    <a href="<?php echo esc_url(KARNA_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'karna' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'karna_admin_errors' ) ) {
	add_action( 'admin_notices', 'karna_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function karna_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_karna-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'karna-notices', 'true', esc_html__( 'Settings saved.', 'karna' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'karna-notices', 'imported', esc_html__( 'Import successful.', 'karna' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'karna-notices', 'reset', esc_html__( 'Settings removed.', 'karna' ), 'updated' );
		}

		settings_errors( 'karna-notices' );
	}
}
