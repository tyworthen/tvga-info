<?php
/**
 * Upcoming Events section. Pulls the next 3 upcoming events from the
 * Events custom post type (Events > Add New Event in wp-admin), soonest
 * first, automatically hiding anything already in the past. Shows demo
 * placeholder cards only when no events have been entered yet at all.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tvga_events_query = tvga_get_upcoming_events( 3 );
?>
<section id="events" aria-labelledby="events-heading">
	<div class="container">
		<div class="events-top">
			<div class="section-head">
				<span class="eyebrow"><?php esc_html_e( 'Upcoming Events', 'tvga' ); ?></span>
				<h2 id="events-heading"><?php esc_html_e( 'Join Us This Season', 'tvga' ); ?></h2>
				<p><?php esc_html_e( "From hands-on classes to fun gatherings, there's something for every gardener.", 'tvga' ); ?></p>
			</div>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'tvga_event' ) ? get_post_type_archive_link( 'tvga_event' ) : '#' ); ?>" class="btn btn-primary"><?php esc_html_e( 'View Full Calendar', 'tvga' ); ?></a>
		</div>

		<?php if ( $tvga_events_query->have_posts() ) : ?>

			<div class="events-grid">
				<?php
				while ( $tvga_events_query->have_posts() ) :
					$tvga_events_query->the_post();
					get_template_part( 'template-parts/card-event' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>

		<?php else : ?>

			<div class="events-grid">
				<?php foreach ( tvga_demo_events() as $event ) : ?>
					<article class="card">
						<div class="card-media">
							<img src="<?php echo esc_url( $event['image'] ); ?>" alt="<?php echo esc_attr( $event['alt'] ); ?>">
							<div class="date-badge"><span class="mon"><?php echo esc_html( $event['mon'] ); ?></span><span class="day"><?php echo esc_html( $event['day'] ); ?></span></div>
						</div>
						<div class="card-body">
							<h3><?php echo esc_html( $event['title'] ); ?></h3>
							<div class="meta-line">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
								<span><?php echo esc_html( $event['time'] ); ?></span>
							</div>
							<div class="meta-line">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 22s7-7.2 7-12a7 7 0 1 0-14 0c0 4.8 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
								<span><?php echo esc_html( $event['location'] ); ?></span>
							</div>
							<a href="<?php echo esc_url( $event['link'] ); ?>" class="card-link"><?php esc_html_e( 'Learn More', 'tvga' ); ?>
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<p style="margin-top:2rem;font-style:italic;font-size:0.85rem;">
				<?php esc_html_e( 'Sample events shown above. Add a real event under Events > Add New Event in wp-admin and these will be replaced automatically.', 'tvga' ); ?>
			</p>

		<?php endif; ?>
	</div>
</section>
