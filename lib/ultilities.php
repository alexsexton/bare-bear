<?php

// Helpful debug action
// Use like this: do_action('_gw_debug', $var);
add_action('debug' , '_gw_debug');

function _gw_debug($data) {
  echo '<pre>' ;
  print_r( $data );
  echo '</pre>';
}

// Helpful var dump action
// Use like this: do_action('_gw_dump', $var);
add_action('dump' , '_gw_dump');

function _gw_dump($data) {
  echo '<pre>' ;
  var_dump( $data );
  echo '</pre>';
}
