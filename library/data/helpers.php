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

/**
 * Undocumented function
 *
 * @param  array[Object] $posts      e.g. from get_posts.
 * @param  string|array  $thumb_size Registered image size to retrieve the source for or a flat array of height and width dimensions.
 *
 * @return array
 */
function pugpress_rewrite_posts( $posts, $thumb_size = 'thumb' ) {
	if ( ! $posts ) {
		return false;
	}

	$posts_new = [];
	foreach ( $posts as $post ) {
		$thumb = get_the_post_thumbnail_url( $post->ID, $thumb_size );
		$posts_new[ $post->ID ]['thumb'] = $thumb ? $thumb : get_template_directory_uri() . '/assets/images/no-thumb.png';
		$posts_new[ $post->ID ]['title'] = $post->post_title;
		$posts_new[ $post->ID ]['link'] = get_permalink( $post->ID );
		$posts_new[ $post->ID ]['excerpt'] = $post->post_excerpt;
	}

	return $posts_new;
}

/**
 * Undocumented function
 *
 * @param  string $location Menu location.
 * @return array
 */
function pugpress_get_menu( $location ) {
	$menus = get_nav_menu_locations();
	$menu  = isset( $menus[ $location ] ) ? wp_get_nav_menu_items( $menus[ $location ] ) : [];

	if ( ! $menu ) {
		return false;
	}

	$menu_new = [];
	foreach ( $menu as $item ) {
		$menu_new[ $item->ID ]['title'] = $item->title;
		$menu_new[ $item->ID ]['link'] = $item->url;
	}

	return $menu_new;
}

/**
 * Undocumented function
 *
 * @param  string $text   String to translate.
 * @param  string $domain Unique identifier for retrieving translated strings.
 *
 * @return string
 */
function _p( $text, $domain = 'pugpress-starter-theme' ) {
	return __( $text, $domain );
}
