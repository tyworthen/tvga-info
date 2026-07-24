<?php
/**
 * Template helper functions shared by template-parts/*.php.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Upcoming events, soonest first, past events automatically excluded.
 * Falls back to nothing (front-page template decides what to show) if the
 * organization hasn't entered any events yet.
 *
 * @param int $count How many to fetch.
 * @return WP_Query
 */
function tvga_get_upcoming_events( $count = 3 ) {
	return new WP_Query(
		array(
			'post_type'      => 'tvga_event',
			'posts_per_page' => $count,
			'meta_key'       => 'tvga_event_date',
			'orderby'        => 'meta_value',
			'order'          => 'ASC',
			'meta_type'      => 'DATE',
			'meta_query'     => array(
				array(
					'key'     => 'tvga_event_date',
					'compare' => '>=',
					'value'   => date( 'Y-m-d' ),
					'type'    => 'DATE',
				),
			),
		)
	);
}

/**
 * Latest Resource articles.
 *
 * @param int $count How many to fetch.
 * @return WP_Query
 */
function tvga_get_resources( $count = 4 ) {
	return new WP_Query(
		array(
			'post_type'      => 'tvga_resource',
			'posts_per_page' => $count,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);
}

/**
 * Split a Y-m-d date into the { "MAR", "14" } shape the date badge needs.
 *
 * @param string $date_string Stored as tvga_event_date (Y-m-d) or empty.
 * @return array{mon:string,day:string}
 */
function tvga_format_date_badge( $date_string ) {
	if ( empty( $date_string ) ) {
		return array( 'mon' => '', 'day' => '' );
	}
	$timestamp = strtotime( $date_string );
	if ( ! $timestamp ) {
		return array( 'mon' => '', 'day' => '' );
	}
	return array(
		'mon' => date_i18n( 'M', $timestamp ),
		'day' => date_i18n( 'j', $timestamp ),
	);
}

/**
 * Demo events shown only when the Events post type is completely empty —
 * e.g. right after the theme is first activated, before anyone in
 * wp-admin has added a real event. Add a real event in
 * Events > Add New Event and these disappear automatically.
 *
 * @return array
 */
function tvga_demo_events() {
	return array(
		array(
			'title'    => 'Onion Growing Class & Exchange',
			'mon'      => 'Mar',
			'day'      => '14',
			'time'     => '10:00 – 11:30 AM',
			'location' => 'Adobe Red Rock Products, 700 E. Village Blvd, Stansbury Park',
			'image'    => 'https://commons.wikimedia.org/wiki/Special:FilePath/Onions.jpg?width=900',
			'alt'      => 'A pile of freshly harvested onions.',
			'link'     => '#',
		),
		array(
			'title'    => 'Monthly Gardening Class: Seed Starting',
			'mon'      => 'Apr',
			'day'      => '9',
			'time'     => '7:00 PM',
			'location' => 'USU Extension Office, 151 N Main St., Tooele',
			'image'    => 'https://commons.wikimedia.org/wiki/Special:FilePath/Tomato_plants_grown_from_seeds_near_window.JPG?width=900',
			'alt'      => 'Young seedlings growing in small pots near a sunny window.',
			'link'     => '#',
		),
		array(
			'title'    => 'USU Fruit Tree Pruning Demonstration',
			'mon'      => 'Mar',
			'day'      => '21',
			'time'     => '1:00 – 3:00 PM',
			'location' => '1884 Blue Peak Drive, Pine Canyon',
			'image'    => 'https://commons.wikimedia.org/wiki/Special:FilePath/Apple_tree_grafting_3.jpg?width=900',
			'alt'      => 'Hands pruning the branch of a young fruit tree.',
			'link'     => '#',
		),
	);
}

/**
 * Demo resource articles shown only when the Resources post type is empty.
 * Add a real article in Resources > Add New Article and these disappear.
 *
 * @return array
 */
function tvga_demo_resources() {
	return array(
		array(
			'title'   => 'Growing Great Onions in Tooele Valley',
			'excerpt' => 'Everything you need to know for big, beautiful onions.',
			'image'   => 'https://commons.wikimedia.org/wiki/Special:FilePath/Onions.jpg?width=700',
			'alt'     => 'Freshly harvested onions of varying colors.',
			'link'    => '#',
		),
		array(
			'title'   => 'Tomato Magic in the Tooele Valley',
			'excerpt' => 'Varieties, timing, and tips for amazing homegrown tomatoes.',
			'image'   => 'https://commons.wikimedia.org/wiki/Special:FilePath/Grape_tomatoes_on_the_vine.JPG?width=700',
			'alt'     => 'Ripe grape tomatoes still on the vine.',
			'link'    => '#',
		),
		array(
			'title'   => 'Small Space, Big Harvests',
			'excerpt' => 'Creative ideas for productive gardens in any space.',
			'image'   => 'https://commons.wikimedia.org/wiki/Special:FilePath/Strawberries_in_basket_2018_G1.jpg?width=700',
			'alt'     => 'A basket filled with freshly picked strawberries.',
			'link'    => '#',
		),
		array(
			'title'   => 'Fruit Tree Care Made Simple',
			'excerpt' => 'Pruning, planting, and seasonal care for healthy trees.',
			'image'   => 'https://commons.wikimedia.org/wiki/Special:FilePath/Apple_tree_grafting_3.jpg?width=700',
			'alt'     => 'Hands tending to the branch of a young fruit tree.',
			'link'    => '#',
		),
	);
}

/**
 * wp_nav_menu() fallback for the header — used only until an administrator
 * assigns a menu at Appearance > Menus > Primary Navigation (header).
 */
function tvga_primary_menu_fallback() {
	$items = array(
		'#'           => 'Home',
		'#about'      => 'About',
		'#events'     => 'Events',
		'#membership' => 'Membership',
		'#volunteer'  => 'Volunteer',
		'#resources'  => 'Resources',
		'#sponsors'   => 'Sponsors',
		'#contact'    => 'Contact',
	);
	echo '<ul id="primary-menu">';
	foreach ( $items as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * wp_nav_menu() fallback for the footer "Quick Links" column.
 */
function tvga_footer_quick_menu_fallback() {
	$items = array(
		'#about'  => 'About TVGA',
		'#membership' => 'Membership',
		'#events' => 'Events Calendar',
		'#'       => 'Garden Tour',
	);
	echo '<ul>';
	foreach ( $items as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * wp_nav_menu() fallback for the footer "Get Involved" column.
 */
function tvga_footer_involved_menu_fallback() {
	$items = array(
		'#volunteer'  => 'Volunteer',
		'#membership' => 'Become a Member',
		'#sponsors'   => 'Sponsor TVGA',
		'#contact'    => 'Contact Us',
	);
	echo '<ul>';
	foreach ( $items as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}
