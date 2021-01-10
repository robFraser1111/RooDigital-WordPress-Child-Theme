<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<?php echo get_option('analytics'); ?> 
	
	<script src="<?php echo get_site_url() ?>\wp-content\themes\RooDigital-child\js\popper.min.js"></script>

	<link rel="stylesheet" href="https://use.typekit.net/fyi7lyr.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	
	<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		.hero-bg {
			clip-path: polygon(0 0, 100% 0, 100% 100%, 0 90%);
			height: 100%;
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			background-image: url(<?php echo get_theme_mod('hero_image', ''); ?>);
		}
	</style>
	<script src="<?php echo get_site_url() ?>\wp-content\themes\RooDigital-child\src\js\bootstrap4\bootstrap.min.js"></script>

</head>

<!-- Pinterest Sharing -->
<script
    type="text/javascript"
    async defer
	src="//assets.pinterest.com/js/pinit.js">
</script>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WPKHMXM" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Facebook Sharing -->
<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0">
</script>

<?php do_action( 'wp_body_open' ); ?>

<div class="site" id="page">

<header class="jumbotron jumbotron-fluid hero-bg p-0">
	<div class="hero-overlay">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" class="pb-5" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<?php if ( is_active_sidebar( 'header' ) ) : ?>
				<div class="container-fluid bg-danger">
					<div class="row p-1">
						<div class="col text-center">
							<?php get_template_part( 'sidebar-header' ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="container-fluid">
				<div class="row pt-3 px-3">
					<div class="col header-icons">
						<?php get_template_part( 'sidebar-social' ); ?>
					</div>
				</div>
			</div>


			<nav class="navbar navbar-expand-md navbar-light">


			<?php if ( 'container' == $container ) : ?>
				<div class="container-fluid">
			<?php endif; ?>

						<!-- Your site title as branding in the menu -->
						<a href="<?php echo get_site_url() ?>">
							<img id="menu-logo" src="<?php echo get_site_url() ?>/wp-content/uploads/RooDigital_Logo.svg" alt="RooDigital">
						</a>
						<!-- end custom logo -->

					<button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="hamburger-box">
							<span class="navbar-toggler-icon hamburger-inner"></span>
						</span>
					</button>

					<?php if ( is_front_page() ) : ?>
						<!-- Main Menu -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					<?php else: ?>
						<!-- Alt Menu -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'alt',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'alt-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					<?php endif; ?>

				<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->

		<!-- Hero Start -->
		<?php if ( is_front_page() ) : ?>
		<div class="container-fluid hero-text">
			<h1 class="display-5 text-center"><strong><?php echo get_the_title(); ?></strong>
			</h1>
			<h2 class="text-center"><?php echo get_bloginfo( 'description' ); ?></h2>
			<div class="text-center hero-btn">
				<a class="shadow btn btn-gold btn-lg m-4" href="#offer" role="button"><b>What we offer</b></a>
				<br>
				<!-- <h3><small>Find out exactly what your trade needs to grow</small></h3>-->
			</div>
		</div>
		<?php endif; ?>
		<!-- Hero End -->

	</div>
</header>

