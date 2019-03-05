<?php

// Deletes all CSS classes and id's, except for those listed in the array below
// Modified from https://gist.github.com/lekkerduidelijk/5576437
function _bare_custom_wp_nav_menu($var) {
  return is_array($var) ? array_intersect($var, array(
    // List of allowed menu classes
    'sub-menu',
    'has-submenu',
  )
  ) : '';
}

add_filter('nav_menu_css_class', '_bare_custom_wp_nav_menu');
add_filter('nav_menu_item_id', '_bare_custom_wp_nav_menu');
add_filter('page_css_class', '_bare_custom_wp_nav_menu');

// Replaces "has-sub-menu" with "u-has-sub"
function _bare_sub_menus($text){
  $replace = array(
    'has-submenu' => 'has-sub',
  );
  $text = str_replace(array_keys($replace), $replace, $text);
  return $text;
}
add_filter ('wp_nav_menu','_bare_sub_menus');

//Deletes empty classes
function _bare_strip_empty_classes($menu) {
  return $menu;
}
add_filter ('wp_nav_menu','_bare_strip_empty_classes');

// Custom walker for Pentland - does some class name replacement and adds a div
// element around the sub-nav. So happy I keep previous projects - thanks Josh
// for spending 3 days working this out two years ago.

class Bare_Nav_Walker extends Walker_Nav_Menu {
  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {

    $indent = str_repeat("\t", $depth);

    if($depth === 0) {
      $output .= "<div class='nav--subnav'>\n";
      $output .= "$indent<ul class='u-unstyled'>\n";
    } else {
      $output .= "<div class='menu-level'>\n";
      $output .= "$indent<ul class='u-unstyled'>\n";
    }
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-submenu';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $output .= $indent . '<li' . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    // check to see whether to include the sub-menu trigger button
    if(in_array( 'has-submenu', $classes) ) {

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      if ($depth === 1) {
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      } else {
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      }
      $item_output .= '</a><a class="subnav--handler" href="#" data-subnav-link="' . $item->ID . '"><span>Open</span></a>';
      $item_output .= $args->after;
    }
    else {
      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;
    }

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}
