<?php
  $args = array(
    'orderby' => 'name',
    'posts_per_page' => 1,
    'post_type' => 'page',
  );
  $query = new WP_Query($args);
?>

<div class="">
  <?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query ->the_post(); ?>
  <div class="">
    <?php the_content(); ?>
  </div>
    <?php endwhile; ?>
  <?php endif; wp_reset_postdata();?>
</div>
