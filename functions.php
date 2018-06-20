<?php
/**
 * Intellectual Property rights, and copyright, reserved by Kubik Ltd. as allowed by law include,
 * but are not limited to, the working concept, function, and behavior of this software,
 * the logical code structure and expression as written.
 *
 * @package     PugPress Starter Theme
 * @author      Kubik Ltd. http://kubikthemes.com/
 * @copyright   Copyright (c) Kubik Ltd. (support@kubikthemes.com)
 * @since       0.0.1
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

// Set theme defaults.
add_action('after_setup_theme', function() {

	// Add post thumbnails support.
	add_theme_support( 'post-thumbnails' );

	// Add title tag theme support.
	add_theme_support( 'title-tag' );

	// Add HTML5 support.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'widgets',
	] );

	// Add primary WordPress menu.
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'pugpress-starter-theme' ) );

	// Make theme available for translation.
	load_theme_textdomain( 'pugpress-starter-theme', get_template_directory() . '/languages' );

	// Head clean up.
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
});

// Enqueue and register scripts the right way.
add_action( 'wp_enqueue_scripts', function() {
	// Remove default WordPress jQuery.
	wp_deregister_script( 'jquery' );

	// Enqueue theme styles.
	wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/app.css', [], '0.0.1', 'all' );

	// Register theme scripts.
	wp_register_script( 'jquery', '//cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js', [], '3.2.1', true );
	wp_register_script( 'app', get_template_directory_uri() . '/assets/app.js', [ 'jquery' ], '0.0.1', true );

	// Enqueue registered theme scripts.
	wp_enqueue_script( [
		'jquery',
		'app',
	] );
} );

// Remove JPEG compression.
add_filter( 'jpeg_quality', function() {
	return 100;
}, 10, 2 );

// Set custom excerpt more.
add_filter( 'excerpt_more', function() {
	return '...';
} );

// Set custom excerpt length.
add_filter( 'excerpt_length', function() {
	return 101;
} );

add_action( 'wp_head', function () {
	?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo pugpress_starter_theme_get_option( 'google_analytics_id', 'main' ); ?>"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo pugpress_starter_theme_get_option( 'google_analytics_id', 'main' ); ?>');
		</script>
	<?php
} );

// Helper functions to use with Pug.
include 'library/data/helpers.php';

// Theme options.
include 'library/cmb2/theme-options.php';
