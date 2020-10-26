<?php

function _bare_register_post_types_books() {

  $plural = 'Books';
  $single = 'Book';
  $slug = 'books';

  $labels = array(
    'name' => $plural,
    'singular_name' => $single,
    'menu_name' => $plural,
    'name_admin_bar' => $plural,
    'parent_item_colon' => 'Parent Item:',
    'all_items' => 'All Authors',
    'add_new_item' => 'Add New ' . $single,
    'add_new' => 'Add New ' . $single,
    'new_item' => 'New ' . $single,
    'edit_item' => 'Edit ' . $single,
    'update_item' => 'Update ' . $single,
    'view_item' => 'View ' . $single,
    'search_items' => 'Search ' . $plural,
    'not_found' => $single . ' not found',
    'not_found_in_trash'  => $single . ' not found in Trash'
  );

  $args = array(
    'label' => $plural,
    'description' =>  $plural,
    'labels' => $labels,
    'supports' => array( 'title', 'excerpt', 'thumbnail', 'editor' ),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-book',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page'
  );

  register_post_type( $slug , $args );

}

add_action( 'init', '_bare_register_post_types_books', 0 );
