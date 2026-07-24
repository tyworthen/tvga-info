<?php
/**
 * The header for the TVGA theme.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tvga_membership_page = get_page_by_path( 'membership' );
$tvga_membership_url  = $tvga_membership_page ? get_permalink( $tvga_membership_page ) : '#membership';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to main content', 'tvga' ); ?></a>

<header class="site-header" id="site-header">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<circle cx="19" cy="12" r="5" fill="#B68D5B"/>
					<circle cx="12" cy="19" r="5" fill="#D27A7A"/>
					<circle cx="26" cy="19" r="5" fill="#6F8F72"/>
					<circle cx="19" cy="19" r="4" fill="#3F5B41"/>
					<path d="M19 23 C19 29 16 32 16 34" stroke="#3F5B41" stroke-width="1.6" fill="none" stroke-linecap="round"/>
				</svg>
				<span>
					<?php bloginfo( 'name' ); ?>
					<span class="sub"><?php echo esc_html( get_bloginfo( 'description' ) ? get_bloginfo( 'description' ) : 'Gardening Association' ); ?></span>
				</span>
			<?php endif; ?>
		</a>

		<nav class="main-nav" aria-label="<?php esc_attr_e( 'Primary', 'tvga' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'fallback_cb'    => 'tvga_primary_menu_fallback',
				)
			);
			?>
		</nav>

		<div class="header-actions">
			<a href="<?php echo esc_url( get_theme_mod( 'member_login_url', '#' ) ); ?>" class="member-login"><?php esc_html_e( 'Member Login', 'tvga' ); ?></a>
			<a href="<?php echo esc_url( $tvga_membership_url ); ?>" class="btn btn-primary"><?php esc_html_e( 'Become a Member', 'tvga' ); ?></a>
			<button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e( 'Open menu', 'tvga' ); ?>" aria-expanded="false" aria-controls="site-header">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>
