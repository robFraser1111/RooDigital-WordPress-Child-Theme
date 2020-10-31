<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found py-5">

						<header class="page-header text-center">

							<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h2>

						</header><!-- .page-header -->

						<div class="page-content">

							<div class="text-center m-5">
								<a href="<?php echo site_url(); ?>">
									<img src="<?php echo site_url(); ?>/wp-content/uploads/sites/4/roodigital_404_01.png" alt="Roo Digital 404" width="300" heigh="300">
								</a>
							</div>

							<div class="text-center">
								<a class="shadow btn btn-gold btn-lg m-4" href="<?php echo site_url(); ?>" role="button"><b>Return home</b></a>
							</div>
							
						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>
