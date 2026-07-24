<?php
/**
 * Customizer settings.
 *
 * Everything a volunteer is likely to need to change over the years —
 * hero text/image, the Garden Tour block, the volunteer banner, the
 * newsletter form target, and the footer's contact/social details —
 * is exposed here in Appearance > Customize rather than hardcoded in a
 * template file.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tvga_sanitize_textarea( $input ) {
	return sanitize_textarea_field( $input );
}

function tvga_customize_register( $wp_customize ) {

	/* ---------------------------------------------------------------
	 * Hero section
	 * ------------------------------------------------------------- */
	$wp_customize->add_section(
		'tvga_hero',
		array(
			'title'    => __( 'Hero Section', 'tvga' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting( 'hero_heading', array(
		'default'           => 'Growing Gardens, Knowledge & Community in Tooele Valley',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_heading', array(
		'label'   => __( 'Headline', 'tvga' ),
		'section' => 'tvga_hero',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'hero_subheading', array(
		'default'           => 'Promoting the love of gardening through education, service, and community.',
		'sanitize_callback' => 'tvga_sanitize_textarea',
	) );
	$wp_customize->add_control( 'hero_subheading', array(
		'label'   => __( 'Subheading', 'tvga' ),
		'section' => 'tvga_hero',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'hero_image', array(
		'default'           => 'https://commons.wikimedia.org/wiki/Special:FilePath/Lakeside_Rose_Garden.JPG?width=1800',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
		'label'   => __( 'Background photo', 'tvga' ),
		'section' => 'tvga_hero',
	) ) );

	$wp_customize->add_setting( 'hero_btn1_text', array( 'default' => 'Become a Member', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_btn1_text', array( 'label' => __( 'Primary button text', 'tvga' ), 'section' => 'tvga_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'hero_btn1_url', array( 'default' => '#membership', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_btn1_url', array( 'label' => __( 'Primary button link', 'tvga' ), 'section' => 'tvga_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'hero_btn2_text', array( 'default' => 'Upcoming Events', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_btn2_text', array( 'label' => __( 'Secondary button text', 'tvga' ), 'section' => 'tvga_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'hero_btn2_url', array( 'default' => '#events', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_btn2_url', array( 'label' => __( 'Secondary button link', 'tvga' ), 'section' => 'tvga_hero', 'type' => 'text' ) );

	/* ---------------------------------------------------------------
	 * Annual Garden Tour
	 * ------------------------------------------------------------- */
	$wp_customize->add_section(
		'tvga_tour',
		array(
			'title'    => __( 'Annual Garden Tour', 'tvga' ),
			'priority' => 31,
		)
	);

	$wp_customize->add_setting( 'tour_dates_location', array(
		'default'           => 'Stansbury Park & Grantsville — June 5 & 6, 2027',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'tour_dates_location', array( 'label' => __( 'Dates & location line', 'tvga' ), 'section' => 'tvga_tour', 'type' => 'text' ) );

	$wp_customize->add_setting( 'tour_tickets_text', array(
		'default'           => 'Tickets go on sale May 22nd!',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'tour_tickets_text', array( 'label' => __( 'Ticket announcement line', 'tvga' ), 'section' => 'tvga_tour', 'type' => 'text' ) );

	$wp_customize->add_setting( 'tour_description', array(
		'default'           => "Tour beautiful local gardens and support TVGA's educational and community programs. Every ticket helps fund scholarships, youth garden education, and public beautification projects across Tooele Valley.",
		'sanitize_callback' => 'tvga_sanitize_textarea',
	) );
	$wp_customize->add_control( 'tour_description', array( 'label' => __( 'Description', 'tvga' ), 'section' => 'tvga_tour', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'tour_years', array(
		'default'           => 27,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'tour_years', array( 'label' => __( 'Years running (badge number)', 'tvga' ), 'section' => 'tvga_tour', 'type' => 'number' ) );

	$wp_customize->add_setting( 'tour_cta_text', array( 'default' => 'Learn More & Buy Tickets', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'tour_cta_text', array( 'label' => __( 'Button text', 'tvga' ), 'section' => 'tvga_tour', 'type' => 'text' ) );

	$wp_customize->add_setting( 'tour_cta_url', array( 'default' => '#', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'tour_cta_url', array( 'label' => __( 'Button link', 'tvga' ), 'section' => 'tvga_tour', 'type' => 'text' ) );

	$wp_customize->add_setting( 'tour_image', array(
		'default'           => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fort_Worth_Botanical_Gardens_Rose_Garden_Wiki_(1_of_1).jpg?width=1400',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tour_image', array(
		'label'   => __( 'Photo', 'tvga' ),
		'section' => 'tvga_tour',
	) ) );

	/* ---------------------------------------------------------------
	 * Volunteer banner
	 * ------------------------------------------------------------- */
	$wp_customize->add_section(
		'tvga_volunteer',
		array(
			'title'    => __( 'Volunteer Banner', 'tvga' ),
			'priority' => 32,
		)
	);

	$wp_customize->add_setting( 'volunteer_heading', array( 'default' => 'Volunteers Make It Grow', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'volunteer_heading', array( 'label' => __( 'Heading', 'tvga' ), 'section' => 'tvga_volunteer', 'type' => 'text' ) );

	$wp_customize->add_setting( 'volunteer_text', array(
		'default'           => 'TVGA is powered by amazing volunteers. Whether you have an hour or a weekend, your time makes a big impact.',
		'sanitize_callback' => 'tvga_sanitize_textarea',
	) );
	$wp_customize->add_control( 'volunteer_text', array( 'label' => __( 'Supporting text', 'tvga' ), 'section' => 'tvga_volunteer', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'volunteer_image', array(
		'default'           => 'https://commons.wikimedia.org/wiki/Special:FilePath/Parkdale_Community_garden_volunteer_day.JPG?width=1800',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'volunteer_image', array(
		'label'   => __( 'Background photo', 'tvga' ),
		'section' => 'tvga_volunteer',
	) ) );

	$wp_customize->add_setting( 'volunteer_btn1_text', array( 'default' => 'Volunteer Opportunities', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'volunteer_btn1_text', array( 'label' => __( 'Primary button text', 'tvga' ), 'section' => 'tvga_volunteer', 'type' => 'text' ) );

	$wp_customize->add_setting( 'volunteer_btn1_url', array( 'default' => '#', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'volunteer_btn1_url', array( 'label' => __( 'Primary button link', 'tvga' ), 'section' => 'tvga_volunteer', 'type' => 'text' ) );

	$wp_customize->add_setting( 'volunteer_btn2_text', array( 'default' => 'Log Volunteer Hours', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'volunteer_btn2_text', array( 'label' => __( 'Secondary button text', 'tvga' ), 'section' => 'tvga_volunteer', 'type' => 'text' ) );

	$wp_customize->add_setting( 'volunteer_btn2_url', array( 'default' => '#', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'volunteer_btn2_url', array( 'label' => __( 'Secondary button link', 'tvga' ), 'section' => 'tvga_volunteer', 'type' => 'text' ) );

	/* ---------------------------------------------------------------
	 * Newsletter
	 * ------------------------------------------------------------- */
	$wp_customize->add_section(
		'tvga_newsletter',
		array(
			'title'    => __( 'Newsletter Signup', 'tvga' ),
			'priority' => 33,
		)
	);

	$wp_customize->add_setting( 'newsletter_heading', array( 'default' => 'Stay in the Know', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'newsletter_heading', array( 'label' => __( 'Heading', 'tvga' ), 'section' => 'tvga_newsletter', 'type' => 'text' ) );

	$wp_customize->add_setting( 'newsletter_text', array(
		'default'           => 'Get updates on events, classes, gardening tips, and Garden Tour news.',
		'sanitize_callback' => 'tvga_sanitize_textarea',
	) );
	$wp_customize->add_control( 'newsletter_text', array( 'label' => __( 'Supporting text', 'tvga' ), 'section' => 'tvga_newsletter', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'newsletter_form_action', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'newsletter_form_action', array(
		'label'       => __( 'Form action URL', 'tvga' ),
		'description' => __( 'Paste your Mailchimp / email-provider form action URL here. Leave blank to render a placeholder form.', 'tvga' ),
		'section'     => 'tvga_newsletter',
		'type'        => 'url',
	) );

	/* ---------------------------------------------------------------
	 * Contact & Social (used in the footer and the header's Member
	 * Login link)
	 * ------------------------------------------------------------- */
	$wp_customize->add_section(
		'tvga_contact',
		array(
			'title'    => __( 'Contact & Social', 'tvga' ),
			'priority' => 34,
		)
	);

	$fields = array(
		'contact_address'  => array( 'P.O. Box 1063, Tooele, UT 84074', __( 'Mailing address', 'tvga' ), 'sanitize_text_field' ),
		'contact_email'    => array( 'info@tvga.info', __( 'Email address', 'tvga' ), 'sanitize_email' ),
		'contact_phone'    => array( '(435) 840-2484', __( 'Phone number', 'tvga' ), 'sanitize_text_field' ),
		'facebook_url'     => array( '#', __( 'Facebook URL', 'tvga' ), 'sanitize_text_field' ),
		'instagram_url'    => array( '#', __( 'Instagram URL', 'tvga' ), 'sanitize_text_field' ),
		'member_login_url' => array( '#', __( 'Member Login link (header)', 'tvga' ), 'sanitize_text_field' ),
	);

	foreach ( $fields as $key => $args ) {
		list( $default, $label, $cb ) = $args;
		$wp_customize->add_setting( $key, array( 'default' => $default, 'sanitize_callback' => $cb ) );
		$wp_customize->add_control( $key, array( 'label' => $label, 'section' => 'tvga_contact', 'type' => 'text' ) );
	}
}
add_action( 'customize_register', 'tvga_customize_register' );
