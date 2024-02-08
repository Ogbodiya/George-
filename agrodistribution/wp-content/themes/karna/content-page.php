<?php
/**
 * The template used for displaying page content in page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php karna_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php
		/**
		 * karna_before_content hook.
		 *
		 *
		 * @hooked karna_featured_page_header_inside_single - 10
		 */
		do_action( 'karna_before_content' );

		if ( karna_show_title() ) : ?>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
			</header><!-- .entry-header -->

		<?php endif;

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
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'karna' ),
				'after'  => '</div>',
			) );
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
</article><!-- #post-## -->
