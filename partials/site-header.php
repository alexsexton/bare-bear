<header class="site-header">

  <?php if ( has_custom_logo() ) : ?>
    <div class="site-logo">
      <?php the_custom_logo(); ?>
    </div>
  <?php else : ?>
    <div class="site-logo">
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
      <p><?php echo get_bloginfo( 'description' ); ?></p>
    </div>
  <?php endif; ?>

  <nav>
    <?php
    wp_nav_menu ( array (
      'theme_location' => 'site_nav_main',
      'container' => 'ul',
      'container_id' => '',
      'depth' => 2,
      'walker' => new Bare_Nav_Walker(),
    ));
    ?>
  </nav>
  
  <?php get_template_part('partials/site-search'); ?>

</header>
