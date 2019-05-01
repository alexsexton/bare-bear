<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>

<main class="main">
  <section>
    <header class="the-category">
      <h1><?php single_cat_title(); ?></h1>
      <?php if (category_description()) :?>
        <p class="the-category-desc"><?php echo category_description(); ?></p>
      <?php endif; ?>
    </header>

    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
      <?php get_template_part('partials/article-list-item'); ?>
    <?php endwhile; endif;?>

  </section>

  <?php get_sidebar(); ?>

  <?php get_template_part('partials/pagination') ?>

</main>

<?php get_footer() ?>
