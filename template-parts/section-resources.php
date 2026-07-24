<?php
/**
 * Gardening Resources grid. Pulls the 4 latest Resource articles
 * (Resources > Add New Article in wp-admin). Shows demo placeholder
 * cards only when no articles have been published yet at all.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tvga_resources_query = tvga_get_resources( 4 );
?>
<section id="resources" aria-labelledby="resources-heading">
	<div class="container">
		<div class="section-head center">
			<span class="eyebrow"><?php esc_html_e( 'Gardening Resources', 'tvga' ); ?></span>
			<h2 id="resources-heading"><?php esc_html_e( 'Tips, Tricks & Local Know-How', 'tvga' ); ?></h2>
			<p><?php esc_html_e( 'Practical articles to help your garden thrive in Tooele Valley.', 'tvga' ); ?></p>
		</div>

		<?php if ( $tvga_resources_query->have_posts() ) : ?>

			<div class="resources-grid">
				<?php
				while ( $tvga_resources_query->have_posts() ) :
					$tvga_resources_query->the_post();
					get_template_part( 'template-parts/card-resource' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>

		<?php else : ?>

			<div class="resources-grid">
				<?php foreach ( tvga_demo_resources() as $resource ) : ?>
					<article class="card resource-card">
						<div class="card-media">
							<img src="<?php echo esc_url( $resource['image'] ); ?>" alt="<?php echo esc_attr( $resource['alt'] ); ?>">
						</div>
						<div class="card-body">
							<h3><?php echo esc_html( $resource['title'] ); ?></h3>
							<p><?php echo esc_html( $resource['excerpt'] ); ?></p>
							<a href="<?php echo esc_url( $resource['link'] ); ?>" class="card-link"><?php esc_html_e( 'Read Article', 'tvga' ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<p style="margin-top:1rem;font-style:italic;font-size:0.85rem;text-align:center;">
				<?php esc_html_e( 'Sample articles shown above. Publish a real one under Resources > Add New Article and these will be replaced automatically.', 'tvga' ); ?>
			</p>

		<?php endif; ?>

		<div class="resources-cta">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'tvga_resource' ) ? get_post_type_archive_link( 'tvga_resource' ) : '#' ); ?>" class="btn btn-outline"><?php esc_html_e( 'Browse All Articles', 'tvga' ); ?></a>
		</div>
	</div>
</section>
