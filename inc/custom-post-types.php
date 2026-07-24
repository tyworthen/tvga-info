<?php
/**
 * Custom post types: Events and Resources.
 *
 * Registering these as their own post types (rather than hardcoding the
 * homepage cards) is what lets a volunteer add or edit an event or article
 * from wp-admin for years without ever touching a template file.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tvga_register_post_types() {

	register_post_type(
		'tvga_event',
		array(
			'labels'        => array(
				'name'               => __( 'Events', 'tvga' ),
				'singular_name'      => __( 'Event', 'tvga' ),
				'add_new_item'       => __( 'Add New Event', 'tvga' ),
				'edit_item'          => __( 'Edit Event', 'tvga' ),
				'new_item'           => __( 'New Event', 'tvga' ),
				'view_item'          => __( 'View Event', 'tvga' ),
				'all_items'          => __( 'All Events', 'tvga' ),
				'search_items'       => __( 'Search Events', 'tvga' ),
				'not_found'          => __( 'No events found.', 'tvga' ),
				'not_found_in_trash' => __( 'No events found in Trash.', 'tvga' ),
				'menu_name'          => __( 'Events', 'tvga' ),
			),
			'public'        => true,
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'events' ),
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-calendar-alt',
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'menu_position' => 20,
		)
	);

	register_post_type(
		'tvga_resource',
		array(
			'labels'        => array(
				'name'               => __( 'Resources', 'tvga' ),
				'singular_name'      => __( 'Resource', 'tvga' ),
				'add_new_item'       => __( 'Add New Article', 'tvga' ),
				'edit_item'          => __( 'Edit Article', 'tvga' ),
				'new_item'           => __( 'New Article', 'tvga' ),
				'view_item'          => __( 'View Article', 'tvga' ),
				'all_items'          => __( 'All Resources', 'tvga' ),
				'search_items'       => __( 'Search Resources', 'tvga' ),
				'not_found'          => __( 'No resource articles found.', 'tvga' ),
				'not_found_in_trash' => __( 'No resource articles found in Trash.', 'tvga' ),
				'menu_name'          => __( 'Resources', 'tvga' ),
			),
			'public'        => true,
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'resources' ),
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-book-alt',
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'menu_position' => 21,
		)
	);
}
add_action( 'init', 'tvga_register_post_types' );
