<?php
// Setup the _bare theme.
function _bare_setup() {

	// Theme setup
	require_once 'lib/setup.php';

	// Image functions
	require_once 'lib/images.php';

	// Theme assets
	require_once 'lib/assets.php';

	// Theme custom post types
	require_once 'lib/post-types.php';

	// Theme custom fields (ACF)
	// require_once 'app/custom-fields.php';

	// Theme custom pagination
	require_once 'lib/pagination.php';

	// Theme sidebars
	require_once 'lib/sidebars.php';

	// Theme custom nav walker
	require_once 'lib/menus.php';

	// Register menus
	register_nav_menus(
		array(
			'site_nav_main' => __( 'Main Navigation' ),
			'site_nav_footer' => __( 'Footer Navigation' ),
		)
	);

	// Fires after the theme setup.
	do_action( '_bare_theme_setup' );
}

add_action( 'after_setup_theme', '_bare_setup', 10, 0 );
