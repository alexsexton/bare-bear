<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>

<main class="main">
  <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
    <section>

      <header class="the-title">
        <h1><?php the_title(); ?></h1>
        <time datetime="<?php echo get_the_date('Y-m-d') ?>" pubdate="<?php echo get_the_date('Y-m-d') ?>"><?php echo get_the_date('j F Y') ?></time>
      </header>

      <article class="the-content rich-text">
        <?php the_content(); ?>
      </article>

      <?php if (has_post_thumbnail()) : ?>
        <div class="post-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

    </section>
  <?php endwhile; endif;?>
</main>

<?php get_footer() ?>
