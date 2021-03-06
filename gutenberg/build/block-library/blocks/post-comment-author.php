<?php
/**
 * Server-side rendering of the `core/post-comment-author` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/post-comment-author` block on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 * @return string Return the post comment's author.
 */
function gutenberg_render_block_core_post_comment_author( $attributes, $content, $block ) {
	if ( ! isset( $block->context['commentId'] ) ) {
		return '';
	}

	$wrapper_attributes = get_block_wrapper_attributes();
	$comment_author     = get_comment_author( $block->context['commentId'] );
	$link               = get_comment_author_url( $block->context['commentId'] );

	if ( ! empty( $attributes['isLink'] ) && ! empty( $attributes['linkTarget'] ) ) {
		$comment_author = sprintf( '<a rel="external nofollow ugc" href="%1s" target="%2s" >%3s</a>', $link, $attributes['linkTarget'], $comment_author );
	}

	return sprintf(
		'<div %1$s>%2$s</div>',
		$wrapper_attributes,
		$comment_author
	);
}

/**
 * Registers the `core/post-comment-author` block on the server.
 */
function gutenberg_register_block_core_post_comment_author() {
	register_block_type_from_metadata(
		__DIR__ . '/post-comment-author',
		array(
			'render_callback' => 'gutenberg_render_block_core_post_comment_author',
		)
	);
}
add_action( 'init', 'gutenberg_register_block_core_post_comment_author', 20 );
