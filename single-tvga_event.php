<?php
/**
 * Single Event template.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main">
	<section class="generic-content">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();
				$date     = get_post_meta( get_the_ID(), 'tvga_event_date', true );
				$time     = get_post_meta( get_the_ID(), 'tvga_event_time', true );
				$location = get_post_meta( get_the_ID(), 'tvga_event_location', true );
				?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<p><a href="<?php echo esc_url( home_url( '/events/' ) ); ?>">&larr; <?php esc_html_e( 'All Events', 'tvga' ); ?></a></p>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>

					<div class="card-body" style="padding:0 0 1.5rem;">
						<?php if ( $date ) : ?>
							<div class="meta-line">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
								<span><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $date ) ) ); ?></span>
							</div>
						<?php endif; ?>
						<?php if ( $time ) : ?>
							<div class="meta-line">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
								<span><?php echo esc_html( $time ); ?></span>
							</div>
						<?php endif; ?>
						<?php if ( $location ) : ?>
							<div class="meta-line">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 22s7-7.2 7-12a7 7 0 1 0-14 0c0 4.8 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/></svg>
								<span><?php echo esc_html( $location ); ?></span>
							</div>
						<?php endif; ?>
					</div>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
			endwhile;
			?>
		</div>
	</section>
</main>

<?php
get_footer();
