<?php
/**
* @param WP_Query|null $wp_query
* @param bool $echo
*
* @return string
* Accepts a WP_Query instance to build pagination (for custom wp_query()),
* or nothing to use the current global $wp_query (eg: taxonomy term page)
* - from https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
*
* USAGE:
*     <?php echo bare_pagination(); ?> //uses global $wp_query
* or with custom WP_Query():
*     <?php
*      $query = new \WP_Query($args);
*       ... while(have_posts()), $query->posts stuff ...
*       echo bare_pagination($query);
*     ?>
*/
function bare_pagination( \WP_Query $wp_query = null, $echo = true ) {

  if ( null === $wp_query ) {
    global $wp_query;
  }

  $pages = paginate_links( [
    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    'format'       => '?paged=%#%',
    'current'      => max( 1, get_query_var( 'paged' ) ),
    'total'        => $wp_query->max_num_pages,
    'type'         => 'array',
    'show_all'     => false,
    'end_size'     => 1,
    'mid_size'     => 0,
    'prev_next'    => true,
    'prev_text'    => sprintf( '<i class="icon--prev"></i><span>%1$s</span>', __( 'Newer' ) ),
    'next_text'    => sprintf( '<i class="icon--next"></i><span>%1$s</span>', __( 'Older') ),
    'add_args'     => false,
    'add_fragment' => ''
  ]
);

if ( is_array( $pages ) ) {

  $pagination = '<nav class="pagination-links"><ul>';

  $count = 1;
  foreach ( $pages as $page ) {
    $pagination .= '<li class="page-item p-item-'.$count.'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
    $count++;
  }

  $pagination .= '</ul></nav>';

  if ( $echo ) {
    echo $pagination;
  } else {
    return $pagination;
  }
}

return null;
}
