<?php
/**
 * Annual Garden Tour feature. All text, the years badge, the photo, and
 * the ticket link are editable at Appearance > Customize > Annual Garden Tour.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="tour" aria-labelledby="tour-heading">
	<div class="container">
		<div class="tour-text">
			<span class="eyebrow"><?php esc_html_e( 'The Annual', 'tvga' ); ?></span>
			<h2 id="tour-heading"><?php esc_html_e( 'Garden Tour', 'tvga' ); ?></h2>
			<p class="tour-meta"><?php echo esc_html( get_theme_mod( 'tour_dates_location', 'Stansbury Park & Grantsville — June 5 & 6, 2027' ) ); ?></p>
			<p class="tour-tickets"><?php echo esc_html( get_theme_mod( 'tour_tickets_text', 'Tickets go on sale May 22nd!' ) ); ?></p>
			<p><?php echo esc_html( get_theme_mod( 'tour_description', "Tour beautiful local gardens and support TVGA's educational and community programs." ) ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'tour_cta_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'tour_cta_text', 'Learn More & Buy Tickets' ) ); ?></a>
		</div>
		<div class="tour-image">
			<img src="<?php echo esc_url( get_theme_mod( 'tour_image', 'https://commons.wikimedia.org/wiki/Special:FilePath/Fort_Worth_Botanical_Gardens_Rose_Garden_Wiki_(1_of_1).jpg?width=1400' ) ); ?>"
				alt="<?php esc_attr_e( 'A lush botanical garden with layered flower beds and a stone path.', 'tvga' ); ?>">
			<div class="tour-badge">
				<span class="num"><?php echo esc_html( get_theme_mod( 'tour_years', 27 ) ); ?>+</span>
				<span class="lbl"><?php esc_html_e( 'Years of Inspiring Gardeners', 'tvga' ); ?></span>
			</div>
		</div>
	</div>
</section>
