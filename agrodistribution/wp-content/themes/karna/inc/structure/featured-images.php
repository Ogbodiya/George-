<?php
/**
 * Featured image elements.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'karna_post_image' ) ) {
	add_action( 'karna_after_entry_header', 'karna_post_image' );
	/**
	 * Prints the Post Image to post excerpts
	 */
	function karna_post_image() {
		// If there's no featured image, return.
		if ( ! has_post_thumbnail() ) {
			return;
		}

		// If we're not on any single post/page or the 404 template, we must be showing excerpts.
		if ( ! is_singular() && ! is_404() ) {
			echo apply_filters( 'karna_featured_image_output', sprintf( // WPCS: XSS ok.
				'<div class="post-image">
					<a href="%1$s">
						%2$s
					</a>
				</div>',
				esc_url( get_permalink() ),
				get_the_post_thumbnail(
					get_the_ID(),
					apply_filters( 'karna_pageheader_default_size', 'full' ),
					array(
						'itemprop' => 'image',
					)
				)
			) );
		}
	}
}

if ( ! function_exists( 'karna_featured_page_header_area' ) ) {
	/**
	 * Build the page header.
	 *
	 *
	 * @param string The featured image container class
	 */
	function karna_featured_page_header_area( $class ) {
		// Don't run the function unless we're on a page it applies to.
		if ( ! is_singular() ) {
			return;
		}

		// Don't run the function unless we have a post thumbnail.
		if ( ! has_post_thumbnail() ) {
			return;
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?> grid-parent">
			<?php the_post_thumbnail(
				apply_filters( 'karna_pageheader_default_size', 'full' ),
				array(
					'itemprop' => 'image',
				)
			); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'karna_featured_page_header' ) ) {
	add_action( 'karna_after_header', 'karna_featured_page_header', 10 );
	/**
	 * Add page header above content.
	 *
	 */
	function karna_featured_page_header() {
		if ( function_exists( 'karna_pageheader' ) ) {
			return;
		}

		if ( is_page() ) {
			karna_featured_page_header_area( 'page-header-image' );
		} 
	}
}

if ( ! function_exists( 'karna_blog_header_image' ) ) {
	add_action( 'karna_after_header', 'karna_blog_header_image', 11 );
	/**
	 * Add blog header above content.
	 *
	 */
	function karna_blog_header_image() {

		if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
			$blog_header_image =  karna_get_setting( 'blog_header_image' ); 
			$blog_header_title =  karna_get_setting( 'blog_header_title' ); 
			$blog_header_text =  karna_get_setting( 'blog_header_text' ); 
			$blog_header_button_text =  karna_get_setting( 'blog_header_button_text' ); 
			$blog_header_button_url =  karna_get_setting( 'blog_header_button_url' ); 
			if ( $blog_header_image != '' ) { ?>
			<div class="page-header-image grid-parent page-header-blog" style="background-image: url(<?php echo esc_url($blog_header_image); ?>)">
                <div class="page-header-blog-inner">
                    <div class="page-header-blog-content-h grid-container">
                        <div class="page-header-blog-content">
                        <?php if ( ( $blog_header_title != '' ) || ( $blog_header_title != '' ) ) { ?>
                            <?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                            <?php if ( $blog_header_title != '' ) { ?>
                            <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                            <div class="clearfix"></div>
                            <?php } ?>
                            <?php if ( $blog_header_button_text != '' ) { ?>
                            <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
			</div>
			<?php
			}
		}
	}
}

if ( ! function_exists( 'karna_featured_page_header_inside_single' ) ) {
	add_action( 'karna_before_content', 'karna_featured_page_header_inside_single', 10 );
	/**
	 * Add post header inside content.
	 * Only add to single post.
	 *
	 */
	function karna_featured_page_header_inside_single() {
		if ( function_exists( 'karna_pageheader' ) ) {
			return;
		}

		if ( is_single() ) {
			karna_featured_page_header_area( 'page-header-image-single' );
		}
	}
}
