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

return [
	'menus' => [
		'primary' => pugpress_get_menu( 'primary-menu' ),
	],
	'year' => date( 'Y' ),
	'social' => [
		'facebook' => '',
		'github' => '',
	],
];
