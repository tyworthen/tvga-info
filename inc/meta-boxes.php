<?php
/**
 * Event Details meta box: date, time, and location fields for the
 * tvga_event post type. Deliberately built with plain add_meta_box() /
 * register_post_meta() — no ACF or other plugin dependency — so the theme
 * has nothing extra to install or keep updated on Hostinger.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Expose the meta fields to the block editor / REST API and set sane
 * sanitize callbacks.
 */
function tvga_register_event_meta() {
	$fields = array(
		'tvga_event_date'     => 'sanitize_text_field',
		'tvga_event_time'     => 'sanitize_text_field',
		'tvga_event_location' => 'sanitize_text_field',
	);

	foreach ( $fields as $key => $sanitize_cb ) {
		register_post_meta(
			'tvga_event',
			$key,
			array(
				'type'              => 'string',
				'single'            => true,
				'show_in_rest'      => true,
				'sanitize_callback' => $sanitize_cb,
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'tvga_register_event_meta' );

function tvga_add_event_meta_box() {
	add_meta_box(
		'tvga_event_details',
		__( 'Event Details', 'tvga' ),
		'tvga_render_event_meta_box',
		'tvga_event',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'tvga_add_event_meta_box' );

function tvga_render_event_meta_box( $post ) {
	wp_nonce_field( 'tvga_save_event_meta', 'tvga_event_meta_nonce' );

	$date     = get_post_meta( $post->ID, 'tvga_event_date', true );
	$time     = get_post_meta( $post->ID, 'tvga_event_time', true );
	$location = get_post_meta( $post->ID, 'tvga_event_location', true );
	?>
	<p>
		<label for="tvga_event_date"><strong><?php esc_html_e( 'Date', 'tvga' ); ?></strong></label><br>
		<input type="date" id="tvga_event_date" name="tvga_event_date" value="<?php echo esc_attr( $date ); ?>" style="width:100%;">
		<span class="description"><?php esc_html_e( 'Used to sort events and to auto-hide past events from the homepage.', 'tvga' ); ?></span>
	</p>
	<p>
		<label for="tvga_event_time"><strong><?php esc_html_e( 'Time', 'tvga' ); ?></strong></label><br>
		<input type="text" id="tvga_event_time" name="tvga_event_time" value="<?php echo esc_attr( $time ); ?>" style="width:100%;" placeholder="e.g. 10:00 &ndash; 11:30 AM">
	</p>
	<p>
		<label for="tvga_event_location"><strong><?php esc_html_e( 'Location', 'tvga' ); ?></strong></label><br>
		<input type="text" id="tvga_event_location" name="tvga_event_location" value="<?php echo esc_attr( $location ); ?>" style="width:100%;" placeholder="e.g. USU Extension Office, 151 N Main St., Tooele">
	</p>
	<?php
}

function tvga_save_event_meta( $post_id ) {
	if ( ! isset( $_POST['tvga_event_meta_nonce'] ) || ! wp_verify_nonce( $_POST['tvga_event_meta_nonce'], 'tvga_save_event_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( 'tvga_event_date', 'tvga_event_time', 'tvga_event_location' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
}
add_action( 'save_post_tvga_event', 'tvga_save_event_meta' );
