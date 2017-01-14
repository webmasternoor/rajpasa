<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lawyeriax-lite
 */

if ( ! function_exists( 'lawyeriax_lite_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function lawyeriax_lite_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$archive_year 	= get_the_time('Y');
	$archive_month 	= get_the_time ('m');
	$archive_day 		= get_the_time ('d');

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<a href="' . esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) . '" rel="bookmark"><i class="fa fa-clock-o"></i>' . $time_string . '</a>'
	);

	$byline = sprintf(
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'lawyeriax_lite_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function lawyeriax_lite_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'lawyeriax-lite' ) );
		if ( $categories_list && lawyeriax_lite_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span><i class="fa fa-folder"></i>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'lawyeriax-lite' ),
				$categories_list
			);
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'lawyeriax-lite' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span><i class="fa fa-tags"></i>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'lawyeriax-lite' ),
				$tags_list
			);
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'lawyeriax-lite' ), esc_html__( '1 Comment', 'lawyeriax-lite' ), esc_html__( '% Comments', 'lawyeriax-lite' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'lawyeriax-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function lawyeriax_lite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'lawyeriax_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'lawyeriax_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lawyeriax_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lawyeriax_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in lawyeriax_lite_categorized_blog.
 */
function lawyeriax_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'lawyeriax_lite_categories' );
}
add_action( 'edit_category', 'lawyeriax_lite_category_transient_flusher' );
add_action( 'save_post',     'lawyeriax_lite_category_transient_flusher' );
