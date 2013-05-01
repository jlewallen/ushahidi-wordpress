<?php defined('SYSPATH') OR die('No direct access allowed.');

/* Load Wordpress. */
$wordpress_path = Kohana::config('wordpress.path');
if ($wordpress_path == '') {
	/* Infer the wordpress path if we can... */
	$path = dirname(__FILE__);
	while ($path != '/') {
		if (is_file($path . '/wp-load.php')) {
			$wordpress_path = $path;
			break;
		}
		if (is_file($path . '/wordpress/wp-load.php')) {
			$wordpress_path = $path . '/wordpress';
			break;
		}
		$path = dirname($path);
	}
}
if ($wordpress_path != '') {
	define('WP_USE_THEMES', false);
	global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
	require($wordpress_path . '/wp-load.php');
}
else {
	throw new Exception("No wordpress path configured.");
}

/**
 * Wordpress helper class.
 */
class wordpress_Core {
        public static function menu($name)
        {
		return wp_nav_menu(array('theme_location' => 'main', 'container_id' => 'navigation', 'menu_id' => 'dropmenu'));
	}

        public static function template($name)
        {
		return wp_nav_menu(array('theme_location' => 'main', 'container_id' => 'navigation', 'menu_id' => 'dropmenu'));
	}
}

