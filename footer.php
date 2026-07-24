<?php
/**
 * The footer for the TVGA theme.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

	<footer class="site-footer" id="contact">
		<div class="footer-top container footer-grid">

			<div class="footer-brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<svg width="34" height="34" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<circle cx="19" cy="12" r="5" fill="#B68D5B"/>
							<circle cx="12" cy="19" r="5" fill="#D27A7A"/>
							<circle cx="26" cy="19" r="5" fill="#FAF8F2"/>
							<circle cx="19" cy="19" r="4" fill="#FFFFFF"/>
						</svg>
						<span><?php bloginfo( 'name' ); ?> <span class="sub">Gardening Association</span></span>
					<?php endif; ?>
				</a>
				<p><?php esc_html_e( 'Promoting the love of gardening through education, service, and community.', 'tvga' ); ?></p>
			</div>

			<div class="footer-col">
				<h4><?php esc_html_e( 'Quick Links', 'tvga' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-quick',
						'container'      => false,
						'items_wrap'     => '<ul>%3$s</ul>',
						'fallback_cb'    => 'tvga_footer_quick_menu_fallback',
					)
				);
				?>
			</div>

			<div class="footer-col">
				<h4><?php esc_html_e( 'Get Involved', 'tvga' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-involved',
						'container'      => false,
						'items_wrap'     => '<ul>%3$s</ul>',
						'fallback_cb'    => 'tvga_footer_involved_menu_fallback',
					)
				);
				?>
			</div>

			<div class="footer-col">
				<h4><?php esc_html_e( 'Connect', 'tvga' ); ?></h4>
				<ul class="footer-contact">
					<li>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 8l9 6 9-6"/><rect x="3" y="5" width="18" height="14" rx="2"/></svg>
						<span><?php echo esc_html( get_theme_mod( 'contact_address', 'P.O. Box 1063, Tooele, UT 84074' ) ); ?></span>
					</li>
					<li>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="M4 4l8 8 8-8"/></svg>
						<span><a href="mailto:<?php echo esc_attr( get_theme_mod( 'contact_email', 'info@tvga.info' ) ); ?>"><?php echo esc_html( get_theme_mod( 'contact_email', 'info@tvga.info' ) ); ?></a></span>
					</li>
					<li>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .3 2 .7 3a2 2 0 0 1-.4 2L8 10a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2-.5c1 .3 2 .5 3 .7a2 2 0 0 1 1.7 2Z"/></svg>
						<span><?php echo esc_html( get_theme_mod( 'contact_phone', '(435) 840-2484' ) ); ?></span>
					</li>
				</ul>
				<div class="footer-social">
					<a href="<?php echo esc_url( get_theme_mod( 'facebook_url', '#' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> on Facebook">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13 22v-8h3l.5-3.5H13V8.3c0-1 .3-1.8 1.8-1.8H17V3.2C16.6 3.1 15.5 3 14.2 3 11.4 3 9.5 4.7 9.5 7.8v2.7H6.5V14h3v8h3.5Z"/></svg>
					</a>
					<a href="<?php echo esc_url( get_theme_mod( 'instagram_url', '#' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> on Instagram">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none"/></svg>
					</a>
				</div>
			</div>

		</div>

		<div class="container footer-bottom">
			<span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> Gardening Association. All rights reserved.</span>
			<span class="footer-bottom-links">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Site by Volunteers', 'tvga' ); ?></a>
				<a href="<?php echo esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : '#' ); ?>"><?php esc_html_e( 'Privacy Policy', 'tvga' ); ?></a>
			</span>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
