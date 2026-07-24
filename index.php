<?php
/**
 * Main fallback template (required by WordPress). Handles the blog index
 * and any query that doesn't match a more specific template.
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
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" style="margin-bottom:3rem;">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a>
						<?php endif; ?>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</article>
					<?php
				endwhile;

				the_posts_pagination();
			else :
				?>
				<p><?php esc_html_e( 'Nothing found.', 'tvga' ); ?></p>
				<?php
			endif;
			?>
		</div>
	</section>
</main>

<?php
get_footer();
