<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package safari
 */


/**
 * Prints HTML with meta information for current post: author and date
 *
 * @since Safari 1.0
 *
 * @return void
 */
if ( ! function_exists( 'safari_posted_on' ) ) {
	function safari_posted_on() {
		$post_icon = '';
		switch ( get_post_format() ) {
			case 'aside':
				$post_icon = 'fa-file-o';
				break;
			case 'audio':
				$post_icon = 'fa-volume-up';
				break;
			case 'chat':
				$post_icon = 'fa-comment';
				break;
			case 'gallery':
				$post_icon = 'fa-camera';
				break;
			case 'image':
				$post_icon = 'fa-picture-o';
				break;
			case 'link':
				$post_icon = 'fa-link';
				break;
			case 'quote':
				$post_icon = 'fa-quote-left';
				break;
			case 'status':
				$post_icon = 'fa-user';
				break;
			case 'video':
				$post_icon = 'fa-video-camera';
				break;
			default:
				$post_icon = 'fa-calendar';
				break;
		}

		
		// Translators: 1: Date link 2: Author link 3: Categories 4: No. of Comments
		$author = sprintf( '<i class="fa fa-user"></i> <address class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">By %3$s</a></address>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'safari' ), get_the_author() ) ),
			get_the_author()
		);
                
                // Translators: 1: Icon 2: Permalink 3: Post date and time 4: Publish date in ISO format 5: Post date
		$date = sprintf( '<i class="fa %1$s"></i> <a href="%2$s" title="Posted %3$s" rel="bookmark"><time class="entry-date" datetime="%4$s" itemprop="datePublished">%5$s</time></a>',
			$post_icon,
			esc_url( get_permalink() ),
			sprintf( esc_html__( '%1$s @ %2$s', 'safari' ), esc_html( get_the_date() ), esc_attr( get_the_time() ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		
		// Translators: 1: Permalink 2: Title 3: No. of Comments
		$comments = sprintf( '<span class="comments-link"><i class="fa fa-comment"></i> <a href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_comments_link() ),
			esc_attr( esc_html__( 'Comment on ' . the_title_attribute( 'echo=0' ) ) ),
			( get_comments_number() > 0 ? sprintf( _n( '%1$s Comment', '%1$s Comments', get_comments_number() ), get_comments_number() ) : esc_html__( 'No Comments', 'safari' ) )
		);

		// Translators: 1: Date 2: Author 3: Categories 4: Comments
		printf( wp_kses( __( '<div class="header-meta">%1$s%2$s<span class="post-categories">%3$s</span>%4$s</div>', 'safari' ), array( 
			'div' => array ( 
				'class' => array() ), 
			'span' => array( 
				'class' => array() ) ) ),
			$author,
                        $date,
			$categories_list,
			( is_search() ? '' : $comments )
		);
	}
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function safari_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'safari_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function safari_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'safari_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function safari_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'safari_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function safari_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'safari' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'safari_wp_title', 10, 2 );