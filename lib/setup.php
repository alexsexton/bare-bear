<?php

// Quite a lot of this file strips WordPress generated crap from the header

// Set production_env to true or false
// If true query strings are stripped from JS and CSS asset files
$production_env = false;

// Remove crap from wp_head
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');

// Disable Emoji mess
function disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

// Apparently this is needed to pass theme check
if ( ! isset( $content_width ) ) {
  $content_width = '100%';
}

// remove wp version param from any enqueued scripts and styles
if ( $production_env == true ) {
  function _bare_remove_wp_ver_css_js( $src ) {
      if ( strpos( $src, 'ver=' ) )
          $src = remove_query_arg( 'ver', $src );
      return $src;
  }
  add_filter( 'style_loader_src', '_bare_remove_wp_ver_css_js', 9999 );
  add_filter( 'script_loader_src', '_bare_remove_wp_ver_css_js', 9999 );
}

// Set the text domain
load_theme_textdomain( '_bare', get_template_directory() . '/languages' );

// Add theme support
add_theme_support( 'html5' );
add_theme_support( 'title-tag' );
//add_theme_support( 'automatic-feed-links' );

// Custom Logo
add_theme_support( 'custom-logo', array(
  'height'      => 250,
  'width'       => 500,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
));

// Remove the additional CSS section
function _bare_remove_css_section( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', '_bare_remove_css_section', 15 );

// Simple function to remove the [...] from excerpt and replace with a 'Read more' link.
function _bare_excerpt_more($more) {
  global $post;
  return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', '_bare' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more', '_bare' ) .'</a>';
}

add_filter( 'excerpt_more', '_bare_excerpt_more' );

// Custom excerpt length - uncomment if needed
// function _bare_custom_excerpt_length( $length ) {
// 	return 21;
// }
// add_filter( 'excerpt_length', '_bare_custom_excerpt_length', 999 );

// Disable tags - uncomment if needed

// function _bare_unregister_tags() {
//     unregister_taxonomy_for_object_type( 'post_tag', 'post' );
// }
// add_action( 'init', '_bare_unregister_tags' );

// Rename 'posts' to 'news' - uncomment if needed

// function _bare_change_post_label() {
//   global $menu;
//   global $submenu;
//   $menu[5][0] = 'News';
//   $submenu['edit.php'][5][0]  = 'News';
//   $submenu['edit.php'][10][0] = 'Add News';
//   $submenu['edit.php'][16][0] = 'News Tags';
//   echo '';
// }
// function _bare_change_post_object() {
//   global $wp_post_types;
//   $labels =& $wp_post_types['post']->labels;
//   $labels->name = 'News';
//   $labels->singular_name = 'News';
//   $labels->add_new = 'Add News';
//   $labels->add_new_item = 'Add News';
//   $labels->edit_item = 'Edit News';
//   $labels->new_item = 'News';
//   $labels->view_item = 'View News';
//   $labels->search_items = 'Search News';
//   $labels->not_found = 'No News found';
//   $labels->not_found_in_trash = 'No News found in Trash';
//   $labels->all_items = 'All News';
//   $labels->menu_name = 'News';
//   $labels->name_admin_bar = 'News';
// }
// add_action('admin_menu', '_bare_change_post_label');
// add_action('init', '_bare_change_post_object');
