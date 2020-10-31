<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
			<div class="container">
			
				<div class="row">
					<div class="col-12">
					<h1 class="mt-large display-5 text-center mt-5 mb-5 paint-stroke">
						<strong><?php echo get_the_title(); ?></strong>
					</h1>
					</div>
				</div>

				<div class="row">
					
					<?php
						$args = array(
							'post_type' => 'post',
							'category_name' => 'blog'
						);

						$post_query = new WP_Query($args);
						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
							$post_query->the_post();
							?>

								<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
									<div class="card h-100">
										<a href="<?php echo get_post_permalink() ?>">
											<?php the_post_thumbnail( array(600, 500), ['class' => 'card-img-top']); ?>
										</a>
											<div class="card-body">
												<a href="<?php echo get_post_permalink() ?>">
													<h2 class="card-title h5"><?php the_title(); ?></h2>
												</a>
												<p class="card-text text-muted">Article by <?php echo get_the_author(); ?>
												<br>
												Published <?php echo get_the_date( 'd M, Y' ); ?></p>
											</div>
										</div>
									</a>
								</div>
							
							<?php
						}
					}
					?>
					
				</div>

			</div>
			
		<?php // the_content(); ?>

		

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
