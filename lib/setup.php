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
function _bare_disable_wp_emojicons() {
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
add_action( 'init', '_bare_disable_wp_emojicons' );

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

// Add woocommerce support
function _bare_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', '_bare_add_woocommerce_support' );

## REST API

// Register acf fields to Wordpress API
// https://support.advancedcustomfields.com/forums/topic/json-rest-api-and-acf/
function create_ACF_meta_in_REST() {
  $postypes_to_exclude = ['acf-field-group','acf-field'];
  $extra_postypes_to_include = ["books"];
  $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

  array_push($post_types, $extra_postypes_to_include);

  foreach ($post_types as $post_type) {
    register_rest_field( $post_type, 'ACF', [
      'get_callback'    => 'expose_ACF_fields',
      'schema'          => null,
    ]
  );
}

}

function expose_ACF_fields( $object ) {
  $ID = $object['id'];
  return get_fields($ID);
}

add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );
