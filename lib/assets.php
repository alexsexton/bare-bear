<?php
// Load theme static assets
function _bare_theme_scripts() {

  if (function_exists('wp_get_environment_type')) {
    switch ( wp_get_environment_type() ) {
      case 'local':
      case 'development':
      case 'staging':
      $cache_buster = time();
      break;

      case 'production':
      default:
      $cache_buster = false;
      break;
    }
  } else {
    $cache_buster = date('zB');
  }

  wp_deregister_script( 'jquery' );
  // Deregister the wp-embed script, and the wp-mediaelement script and stylesheet.
  wp_deregister_script( 'wp-embed' );
  wp_deregister_script( 'wp-mediaelement' );
  wp_deregister_style( 'wp-mediaelement' );
  // Deregister the wp-block-library block library styles
  wp_deregister_style( 'wp-block-library' );
  // Dequeue guttenberg global styles - if using classic editor
  wp_dequeue_style( 'global-styles' );
  // Deregister other plugin styles - customise as needed
  // Deregister the wc-block-style block library styles
  // wp_deregister_style( 'wc-block-style' );
  // Deregister the bogo library styles
  // wp_deregister_style( 'bogo' );

  wp_enqueue_style('main-styles', get_template_directory_uri() . '/static/main.css', array(), $cache_buster );

  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/static/lib/jquery-3.6.0.min.js', array(), false, true  );

  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/static/main.js', array(), $cache_buster, true  );
}
add_action( 'wp_enqueue_scripts', '_bare_theme_scripts' );
