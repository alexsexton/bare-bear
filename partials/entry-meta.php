<div class="byline author vcard">

  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author(); ?></a>

  <time class="published" datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>

  <?php $terms = wp_get_object_terms( $post->ID, 'category' ); ?>
  <?php foreach ($terms as $term) : ?>
    <?php if ( ($term->slug !== 'uncategorised') && ($term->slug !== 'uncategorized')) : ?>
        <li><a href="/<?php echo $term->taxonomy.'/'.$term->slug ?>"><?php echo $term->name; ?></a></li>
    <?php endif; ?>
  <?php endforeach; ?>

</div>
