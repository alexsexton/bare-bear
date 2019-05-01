<?php
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
