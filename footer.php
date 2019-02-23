<footer>

  <?php
    wp_nav_menu ( array (
      'theme_location' => 'site_nav_footer',
      'container' => 'ul',
      'container_id' => '',
      'depth' => 1,
      'walker' => new Bare_Nav_Walker(),
    ));
  ?>

<small>&copy; Copyright <?php echo(date(Y)); ?></small>

</footer>

<?php wp_footer(); ?>

</body>
</html>
