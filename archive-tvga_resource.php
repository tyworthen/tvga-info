<?php
/**
 * Archive of all Resource articles.
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
				<span class="eyebrow"><?php esc_html_e( 'Gardening Resources', 'tvga' ); ?></span>
				<h1><?php esc_html_e( 'Tips, Tricks & Local Know-How', 'tvga' ); ?></h1>
			</div>

			<?php if ( have_posts() ) : ?>
				<div class="resources-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/card', 'resource', array( 'post_id' => get_the_ID() ) );
					endwhile;
					?>
				</div>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<div class="resources-empty">
					<p><?php esc_html_e( 'No articles have been published yet — check back soon.', 'tvga' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
