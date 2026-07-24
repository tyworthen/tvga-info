<?php
/**
 * Full-width Volunteer banner. Text, photo, and both buttons are editable
 * at Appearance > Customize > Volunteer Banner.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="volunteer" id="volunteer" aria-labelledby="volunteer-heading">
	<img src="<?php echo esc_url( get_theme_mod( 'volunteer_image', 'https://commons.wikimedia.org/wiki/Special:FilePath/Parkdale_Community_garden_volunteer_day.JPG?width=1800' ) ); ?>"
		alt="<?php esc_attr_e( 'A group of volunteers working together planting a community garden.', 'tvga' ); ?>">
	<div class="container">
		<div class="volunteer-content">
			<h2 id="volunteer-heading">
				<?php echo esc_html( get_theme_mod( 'volunteer_heading', 'Volunteers Make It Grow' ) ); ?>
				<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12 21s-7-4.6-9.4-9C1 8.6 2.4 5 6 5c2 0 3.4 1.2 4 2.4C10.6 6.2 12 5 14 5c1.6 0 2.8.7 3.6 1.7"/><path d="M13 12l3-3 3 3-6 6-3-3 1-1"/></svg>
			</h2>
			<p><?php echo esc_html( get_theme_mod( 'volunteer_text', 'TVGA is powered by amazing volunteers. Whether you have an hour or a weekend, your time makes a big impact.' ) ); ?></p>
			<div class="volunteer-actions">
				<a href="<?php echo esc_url( get_theme_mod( 'volunteer_btn1_url', '#' ) ); ?>" class="btn btn-white"><?php echo esc_html( get_theme_mod( 'volunteer_btn1_text', 'Volunteer Opportunities' ) ); ?></a>
				<a href="<?php echo esc_url( get_theme_mod( 'volunteer_btn2_url', '#' ) ); ?>" class="btn btn-outline-white"><?php echo esc_html( get_theme_mod( 'volunteer_btn2_text', 'Log Volunteer Hours' ) ); ?></a>
			</div>
		</div>
	</div>
</section>
