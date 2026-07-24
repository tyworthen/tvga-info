<?php
/**
 * Reusable Event card. Expects to be called from inside an active loop
 * (either the main query on the Events archive, or a custom WP_Query's
 * the_post() loop on the homepage) so standard template tags work.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tvga_date  = get_post_meta( get_the_ID(), 'tvga_event_date', true );
$tvga_time  = get_post_meta( get_the_ID(), 'tvga_event_time', true );
$tvga_loc   = get_post_meta( get_the_ID(), 'tvga_event_location', true );
$tvga_badge = tvga_format_date_badge( $tvga_date );
?>
<article class="card">
	<div class="card-media">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium_large', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		<?php endif; ?>
		<?php if ( $tvga_badge['day'] ) : ?>
			<div class="date-badge"><span class="mon"><?php echo esc_html( $tvga_badge['mon'] ); ?></span><span class="day"><?php echo esc_html( $tvga_badge['day'] ); ?></span></div>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<h3><?php the_title(); ?></h3>
		<?php if ( $tvga_time ) : ?>
			<div class="meta-line">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
				<span><?php echo esc_html( $tvga_time ); ?></span>
			</div>
		<?php endif; ?>
		<?php if ( $tvga_loc ) : ?>
			<div class="meta-line">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 22s7-7.2 7-12a7 7 0 1 0-14 0c0 4.8 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
				<span><?php echo esc_html( $tvga_loc ); ?></span>
			</div>
		<?php endif; ?>
		<a href="<?php the_permalink(); ?>" class="card-link"><?php esc_html_e( 'Learn More', 'tvga' ); ?>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
		</a>
	</div>
</article>
