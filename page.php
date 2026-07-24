<?php
/**
 * Default template for standard Pages (About, Membership, Volunteer,
 * Sponsors, Contact, etc). Keeps the same header/footer and typography as
 * the homepage so every URL on the site feels consistent, even before a
 * dedicated template is designed for a given page.
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
				?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>

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
