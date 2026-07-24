<?php
/**
 * Reusable Resource (article) card. Expects to be called from inside an
 * active loop, same pattern as card-event.php.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article class="card resource-card">
	<div class="card-media">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<h3><?php the_title(); ?></h3>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></p>
		<a href="<?php the_permalink(); ?>" class="card-link"><?php esc_html_e( 'Read Article', 'tvga' ); ?>
			<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
		</a>
	</div>
</article>
