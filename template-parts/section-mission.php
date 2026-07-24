<?php
/**
 * Four-column mission icons (Community / Education / Service / Garden Tour).
 * Intentionally static — this is the org's core mission statement, not
 * something that needs day-to-day editing. Change the copy directly here
 * if the mission statement itself ever changes.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="mission" id="about" aria-label="<?php esc_attr_e( 'Our mission', 'tvga' ); ?>">
	<div class="container mission-grid">

		<div class="mission-item">
			<svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><path d="M14.5 14.2c2.5.3 4.5 2.4 4.5 5.3"/></svg>
			<h3><?php esc_html_e( 'Community', 'tvga' ); ?></h3>
			<p><?php esc_html_e( 'Connecting gardeners through events, classes, and shared experiences.', 'tvga' ); ?></p>
		</div>

		<div class="mission-item">
			<svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M12 3c4 2 7 5 7 10a7 7 0 0 1-14 0c0-5 3-8 7-10Z"/><path d="M12 8v13"/></svg>
			<h3><?php esc_html_e( 'Education', 'tvga' ); ?></h3>
			<p><?php esc_html_e( 'Practical gardening knowledge for our unique Tooele Valley climate.', 'tvga' ); ?></p>
		</div>

		<div class="mission-item">
			<svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M4 9h11l3 3v3H4z"/><path d="M9 9V6a2 2 0 0 1 2-2h2"/><path d="M8 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/><path d="M17 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/></svg>
			<h3><?php esc_html_e( 'Service', 'tvga' ); ?></h3>
			<p><?php esc_html_e( 'Giving back through volunteer projects that beautify our community.', 'tvga' ); ?></p>
		</div>

		<div class="mission-item">
			<svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><circle cx="12" cy="7" r="2.4"/><circle cx="17" cy="12" r="2.4"/><circle cx="12" cy="17" r="2.4"/><circle cx="7" cy="12" r="2.4"/><circle cx="12" cy="12" r="1.6" fill="currentColor" stroke="none"/></svg>
			<h3><?php esc_html_e( 'Garden Tour', 'tvga' ); ?></h3>
			<p><?php esc_html_e( 'Our signature event showcasing beautiful local gardens since 1998.', 'tvga' ); ?></p>
		</div>

	</div>
</section>
