<article <?php post_class('the-content rich-text'); ?>>
  <header>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('partials/entry-meta'); ?>
  </header>

  <div class="excerpt">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('large'); ?>
    <?php endif; ?>
    <?php the_excerpt(); ?>

    <a class="read-more" href="<?php the_permalink() ?>"><?php esc_html_e( 'Read more', '_bare' ); ?></a>

    <?php if (get_comments_number() != 0) : ?>
    <span> &mdash; </span>
    <a href="<?php comments_link() ?>"><?php printf(_n('1 comment', '%1$s comments', get_comments_number(),
    '_bare'), number_format_i18n(get_comments_number())) ?></a>
    
  <?php endif; ?>
</div>
</article>
