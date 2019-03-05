<form class="site-search" method="get" action="/">
  <fieldset class="form-group">
    <label for="s"><?php esc_html_e( 'What are you looking for?', '_bare' ); ?></label>
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" />
    <button class="button" type="submit"><?php esc_html_e( 'Search', '_bare' ); ?></button>
  </fieldset>
</form>
