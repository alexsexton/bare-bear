<?php

  // Post thumbnail and other image related stuff
  if (function_exists( 'add_theme_support' )) {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'open-graph-image', 1200, 1200, true );
    add_image_size( 'twitter-summary-card', 600, 600, true );
    add_image_size( 'twitter-summary-large-image-card', 1200, 675, true );
    add_image_size( 'twitter-player-card', 350, 196, true );
    add_image_size( 'image-twitter-photo-card', 280, 150, true );
  }

 // Removes height & widths on images
	function bare_remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}
	add_filter( 'post_thumbnail_html', 'bare_remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'bare_remove_thumbnail_dimensions', 10 );
	add_filter( 'the_content', 'bare_remove_thumbnail_dimensions', 10 );

  // Removes P Tags wrapped around images from WYSIWYG editor
	function bare_filter_ptags_on_images($content) {
		$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
		return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
	}
	add_filter( 'acf_the_content', 'bare_filter_ptags_on_images' );
	add_filter( 'the_content', 'bare_filter_ptags_on_images' );
