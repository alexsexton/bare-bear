<?php

/**
 * Shelf Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

?>
<section class="section section--readingroom">

  <?php if( have_rows('top_shelf') ): ?>
  <div class="readingroom--library library--top">
    <?php $count = 1; while( have_rows('top_shelf') ): the_row();
      $title = get_sub_field('title') ?: 'Book title...';
      $isbn = get_sub_field('ISBN') ?: 'ISBN';
      $image = get_sub_field('image');
      $url = get_sub_field('link') ;
    ?>
    <?php do_action('_gw_dump', $image); ?>
    <?php if ($count === 0) : ?>
      <div class="m-books-lying" aria-hidden="true">
          <img src="/images/books-lying.png" alt="">
      </div>
    <?php else: ?>
      <div class="m-book">
          <a href="<?php echo $url; ?>">
              <?php echo wp_get_attachment_image( $image, 'full' ); ?>
              <h2><?php echo $title; ?></h2>
              <p><?php echo $count; ?></p>
          </a>
      </div>
    <?php endif; ?>
  <?php $count++; endwhile;  ?>
  </div>
  <?php endif; ?>

  <?php if( have_rows('middle_shelf') ): ?>
  <div class="readingroom--library library--middle">
    <?php $count = 1; while( have_rows('middle_shelf') ): the_row();
      $title = get_sub_field('title') ?: 'Book title...';
      $isbn = get_sub_field('ISBN') ?: 'ISBN';
      $image = get_sub_field('image');
      $url = get_sub_field('link') ;
    ?>
    <?php do_action('_gw_dump', $image); ?>
    <?php if ($count === 0) : ?>
      <div class="m-books-lying" aria-hidden="true">
          <img src="/images/books-lying.png" alt="">
      </div>
    <?php else: ?>
      <div class="m-book">
          <a href="<?php echo $url; ?>">
              <?php echo wp_get_attachment_image( $image, 'full' ); ?>
              <h2><?php echo $title; ?></h2>
              <p><?php echo $count; ?></p>
          </a>
      </div>
    <?php endif; ?>
  <?php $count++; endwhile;  ?>
  </div>
  <?php endif; ?>

  <?php if( have_rows('bottom_shelf') ): ?>
  <div class="readingroom--library library--bottom">
    <?php $count = 1; while( have_rows('bottom_shelf') ): the_row();
        $title = get_sub_field('title') ?: 'Book title...';
        $isbn = get_sub_field('ISBN') ?: 'ISBN';
        $image = get_sub_field('image');
        $url = get_sub_field('link') ?: 'https://www.waterstones.com/';
    ?>
    <?php do_action('_gw_dump', $image); ?>
    <?php if ($count === 0) : ?>
      <div class="m-books-lying" aria-hidden="true">
          <img src="/images/books-lying.png" alt="">
      </div>
    <?php else: ?>
      <div class="m-book">
          <a href="<?php echo $url; ?>">
              <?php echo wp_get_attachment_image( $image, 'full' ); ?>
              <h2><?php echo $title; ?></h2>
              <p><?php echo $count; ?></p>
          </a>
      </div>
    <?php endif; ?>
  <?php $count++; endwhile;  ?>
  </div>
  <?php endif; ?>


</section>
