<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>

<main class="main">
  <section>

    <header class="c-archive-hero--header">
      <h1><?php esc_html_e( 'Search results', 'bare' ); ?></h1>
      <p><?php esc_html_e( 'We found', 'bare' ); ?> <?php
      $count = $GLOBALS['wp_query']->found_posts;
      echo sprintf(_n('<span class="count">%d</span> <strong>post</strong>', '<span class="count">%d</span> <strong>posts</strong>', $count), number_format_i18n($count));
      ?>.</p>
      <a class="button button--back" href="javascript:window.history.go(-1);"><?php esc_html_e( 'Back', 'bare' ); ?></a>
    </header>

    <form class="site-search" method="get" action="/">
      <fieldset class="form-group">
        <label for="s"><?php esc_html_e( 'Search again...', 'bare' ); ?></label>
        <input type="search" value="<?php echo get_search_query(); ?>" name="s" />
        <button class="button" type="submit"><?php esc_html_e( 'Search', 'bare' ); ?></button>
      </fieldset>
    </form>

    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

      <?php get_template_part('partials/article-list-item'); ?>

    <?php endwhile; endif;?>

    <?php get_template_part('partials/pagination') ?>
  </section>
</main>

<?php get_footer() ?>
