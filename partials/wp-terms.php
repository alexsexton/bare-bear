<?php
  $terms = get_terms( array(
    'taxonomy' => 'post_tag',
    'hide_empty' => false,
  ) );
?>

<div class="terms">
    <?php foreach( $terms as $term ) { ?>
      <?php
        echo '<pre>' ;
        print_r( $term );
        echo '</pre>';
      ?>
    <?php if( $term->slug !== 'uncategorized' ) : ?>
      <div class="term"><a href="/<?php echo $term->taxonomy.'/'.$term->slug ?>"><?php echo $term->name; ?></a></li>
    <?php endif; ?>
    <?php }; ?>
</div>
