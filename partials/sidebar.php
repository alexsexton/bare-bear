<aside class="sidebar" role="complementary">
  <div class="categories">
    <h3><?php esc_html_e( 'Categories', '_bare' ); ?></h3>
    <ul>
      <?php wp_list_categories( array(
        'orderby' => 'name',
        'title_li' => '',
      )); ?>
    </ul>
  </div>

  <?php if (get_the_tags()) : ?>
    <div class="tags">
      <h3><?php esc_html_e( 'Tags', '_bare' ); ?></h3>
      <p><?php the_tags('',', ','') ?></p>
    </div>
  <?php endif ?>

</aside>
