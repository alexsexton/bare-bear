<p class="byline author vcard">
  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author(); ?></a>,
  <time class="published" datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time> &mdash; <?php echo get_the_category_list(', ') ?>
</p>
