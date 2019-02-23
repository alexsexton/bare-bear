<aside class="sidebar" role="complementary">
  <div class="categories">
    <h3>Categories</h3>
    <?php wp_list_categories( array(
      'orderby' => 'name',
      'title_li' => '',
    )); ?>
  </div>

  <?php if (get_the_tags()) : ?>
    <div class="tags">
      <h3>Tags</h3>
      <p><?php the_tags('',', ','') ?></p>
    </div>
  <?php endif ?>
  
</aside>
