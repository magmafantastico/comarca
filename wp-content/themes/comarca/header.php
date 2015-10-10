<?php
/**
 * The template for displaying the header
 *
 * @package Comarca
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js lato">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/villa.min.js"></script>
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/villa.min.css">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header">

	<div class="container">

		<style>

			.branding {
				padding: 2.25em 0;
			}

		</style>

		<div class="branding flex">

			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logotype-lato-fresh_LogoTypeWhite.png" class="teal-900" alt="" width="160">

		</div>

		<style>

			.nav-menu {
				border-top: solid 1px #000000;
				display: flex;
				justify-content: space-between;
				padding: .5em 0 1.5em;
				font-weight: 700;
			}

		</style>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
				// Primary navigation menu.
				wp_nav_menu( array(
					'menu_class'     => 'nav-menu',
					'theme_location' => 'primary',
				) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

	</div>

</header>

<?php //get_sidebar(); ?>
