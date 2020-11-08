<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header mt-5 mb-4">

		<?php the_title( '<h1 class="entry-title"><strong>', '</strong></h1>' ); ?>

		<!-- <h5 class="text-muted">Article by <?php // echo get_the_author(); ?><br>Published <?php // echo get_the_date( 'd M, Y' ); ?></h5> -->

		<?php get_template_part( 'template-parts/social-share' ); ?>

	</header><!-- .entry-header -->

	<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer d-none">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
