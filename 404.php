<?php
/**
 * 404 template.
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
		<div class="container" style="text-align:center;">
			<h1><?php esc_html_e( 'Page not found', 'tvga' ); ?></h1>
			<p><?php esc_html_e( "The page you're looking for doesn't exist. It may have been moved or removed.", 'tvga' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to Home', 'tvga' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
