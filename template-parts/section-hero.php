<?php
/**
 * Hero section. All text, the photo, and both buttons are editable at
 * Appearance > Customize > Hero Section.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="hero" aria-labelledby="hero-heading">
	<img src="<?php echo esc_url( get_theme_mod( 'hero_image', 'https://commons.wikimedia.org/wiki/Special:FilePath/Lakeside_Rose_Garden.JPG?width=1800' ) ); ?>"
		alt="<?php esc_attr_e( 'A sunlit garden path lined with flowering plants leading toward a garden arbor.', 'tvga' ); ?>">
	<div class="container">
		<div class="hero-content">
			<h1 id="hero-heading"><?php echo esc_html( get_theme_mod( 'hero_heading', 'Growing Gardens, Knowledge & Community in Tooele Valley' ) ); ?></h1>
			<p><?php echo esc_html( get_theme_mod( 'hero_subheading', 'Promoting the love of gardening through education, service, and community.' ) ); ?></p>
			<div class="hero-actions">
				<a href="<?php echo esc_url( get_theme_mod( 'hero_btn1_url', '#membership' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'hero_btn1_text', 'Become a Member' ) ); ?></a>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_btn2_url', '#events' ) ); ?>" class="btn btn-outline-white"><?php echo esc_html( get_theme_mod( 'hero_btn2_text', 'Upcoming Events' ) ); ?></a>
			</div>
		</div>
	</div>
</section>
