<?php
/**
 * The homepage template.
 *
 * Assembles the componentized sections from template-parts/ in the order
 * specified in the design brief. To reorder, remove, or duplicate a
 * section, just reorder/comment out a get_template_part() line below —
 * no page builder involved.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main">
	<?php
	get_template_part( 'template-parts/section', 'hero' );
	get_template_part( 'template-parts/section', 'mission' );
	get_template_part( 'template-parts/section', 'events' );
	get_template_part( 'template-parts/section', 'tour' );
	get_template_part( 'template-parts/section', 'resources' );
	get_template_part( 'template-parts/section', 'volunteer' );
	get_template_part( 'template-parts/section', 'newsletter' );
	?>
</main>

<?php
get_footer();
