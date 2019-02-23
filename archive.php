<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>

<main class="main">
  <section>
    <header class="blog-description">
      <h1><?php single_cat_title(); ?></h1>
      <?php if (category_description()) :?>
        <?php echo category_description(); ?>
      <?php endif; ?>
    </header>

    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
      <?php get_template_part('partials/article-list-item'); ?>
    <?php endwhile; endif;?>

  </section>

  <?php get_template_part('partials/sidebar'); ?>
  
  <div class="pagination">
    <?php get_template_part('partials/pagination') ?>
  </div>
</main>

<?php get_footer() ?>
