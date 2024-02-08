<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php karna_content_class(); ?>>
		<main id="main" <?php karna_main_class(); ?>>
			<?php
			/**
			 * karna_before_main_content hook.
			 *
			 */
			do_action( 'karna_before_main_content' );
			?>

			<div class="inside-article">

				<?php
				/**
				 * karna_before_content hook.
				 *
				 *
				 * @hooked karna_featured_page_header_inside_single - 10
				 */
				do_action( 'karna_before_content' );
				?>

				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php echo esc_html( apply_filters( 'karna_404_title', __( 'Oops! That page can&rsquo;t be found.', 'karna' ) ) ); // WPCS: XSS OK. ?></h1>
				</header><!-- .entry-header -->

				<?php
				/**
				 * karna_after_entry_header hook.
				 *
				 *
				 * @hooked karna_post_image - 10
				 */
				do_action( 'karna_after_entry_header' );
				?>

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>' . esc_html( apply_filters( 'karna_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'karna' ) ) ) . '</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->

				<?php
				/**
				 * karna_after_content hook.
				 *
				 */
				do_action( 'karna_after_content' );
				?>

			</div><!-- .inside-article -->

			<?php
			/**
			 * karna_after_main_content hook.
			 *
			 */
			do_action( 'karna_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * karna_after_primary_content_area hook.
	 *
	 */
	 do_action( 'karna_after_primary_content_area' );

	 karna_construct_sidebars();

get_footer();
