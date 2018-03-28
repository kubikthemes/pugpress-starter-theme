<?php
/**
 * Intellectual Property rights, and copyright, reserved by Kubik Ltd. as allowed by law include,
 * but are not limited to, the working concept, function, and behavior of this software,
 * the logical code structure and expression as written.
 *
 * @package     PugPress Starter Theme
 * @author      Kubik Ltd. http://kubikplugins.com/
 * @copyright   Copyright (c) Kubik Ltd. (support@kubikplugins.com)
 * @since       0.0.1
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

$base = include 'library/data/base.php';

$data = array_merge( $base, [
	// TODO: decide if its OK to use $posts directly.
	'posts' => pugpress_rewrite_posts( $posts ),
] );

if ( function_exists( 'pugpress_render' ) ) {
	pugpress_render( 'index', $data );
} else {
	esc_html_e( 'This theme requires the PugPress plugin in order to work. Please, install it now!', 'pugpress-starter-theme' );
}
