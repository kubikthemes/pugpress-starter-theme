<?php
/**
 * Template Name: Page Builder
 *
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
	'sections' => [
		[ 'n' => 's-hr' ],
		[
			'n' => 's-link',
			'o' => [
				'title' => 'Lorem ipsum',
				'link' => '#',
			],
		],
		[ 'n' => 's-hr' ],
	],
] );

if ( function_exists( 'pugpress_render' ) ) {
	pugpress_render( 'page-builder', $data );
} else {
	esc_html_e( 'This theme requires the PugPress plugin in order to work. Please, install it now!', 'pugpress-starter-theme' );
}
