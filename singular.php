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

$base = include 'library/data/base.php';

$data = array_merge( $base, [
	'post' => [
		'title' => get_the_title(),
		// TODO: decide if its OK to access post_content directly.
		'content' => apply_filters( 'the_content', $post->post_content ),
	],
] );

if ( function_exists( 'pugpress_render' ) ) {
	pugpress_render( 'singular', $data );
} else {
	esc_html_e( 'This theme requires the PugPress plugin in order to work. Please, install it now!', 'pugpress-starter-theme' );
}
