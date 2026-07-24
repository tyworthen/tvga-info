<?php
/**
 * Archive of all Events (chronological, includes past events — the
 * homepage is what filters to "upcoming only").
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main">
	<section>
		<div class="container">
			<div class="section-head center">
				<span class="eyebrow"><?php esc_html_e( 'TVGA', 'tvga' ); ?></span>
				<h1><?php esc_html_e( 'All Events', 'tvga' ); ?></h1>
			</div>

			<?php if ( have_posts() ) : ?>
				<div class="events-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/card', 'event', array( 'post_id' => get_the_ID() ) );
					endwhile;
					?>
				</div>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<div class="events-empty">
					<p><?php esc_html_e( 'No events are scheduled right now — check back soon.', 'tvga' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
