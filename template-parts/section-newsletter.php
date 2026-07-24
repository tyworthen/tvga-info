<?php
/**
 * Newsletter signup. Point this at your email provider's form action URL
 * (Mailchimp, Constant Contact, etc.) at Appearance > Customize >
 * Newsletter Signup. Until a URL is set, the form is a visual placeholder.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tvga_action = get_theme_mod( 'newsletter_form_action', '' );
?>
<section class="newsletter" aria-labelledby="newsletter-heading">
	<div class="container">
		<h2 id="newsletter-heading"><?php echo esc_html( get_theme_mod( 'newsletter_heading', 'Stay in the Know' ) ); ?></h2>
		<p><?php echo esc_html( get_theme_mod( 'newsletter_text', 'Get updates on events, classes, gardening tips, and Garden Tour news.' ) ); ?></p>
		<form class="newsletter-form" action="<?php echo esc_url( $tvga_action ? $tvga_action : '#' ); ?>" method="post" target="_blank">
			<label for="newsletter-email"><?php esc_html_e( 'Email address', 'tvga' ); ?></label>
			<input type="email" id="newsletter-email" name="email" placeholder="<?php esc_attr_e( 'Enter your email address', 'tvga' ); ?>" required>
			<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Subscribe', 'tvga' ); ?></button>
		</form>
		<?php if ( ! $tvga_action ) : ?>
			<p style="margin-top:1rem;font-style:italic;font-size:0.85rem;">
				<?php esc_html_e( 'Admin note: add your email provider\'s form action URL under Appearance > Customize > Newsletter Signup to make this form live.', 'tvga' ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>
