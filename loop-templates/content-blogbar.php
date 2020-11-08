<div class="mt-5 blog-bar">

    <h4 class="mb-4">Latest articles</h4>

    <?php
        $args = array(
            'post_type' => 'post',
            'category_name' => 'blog',
            'posts_per_page' => 4,
            'post__not_in' => array( $post->ID )
        );

        $post_query = new WP_Query($args);
        if($post_query->have_posts() ) {
            while($post_query->have_posts() ) {
            $post_query->the_post();
            ?>

                <div class="media mb-4">

                    <a href="<?php echo get_post_permalink() ?>">
                        <?php the_post_thumbnail( array(125, 100), ['class' => 'mr-3']); ?>
                    </a>

                    <div class="media-body">
                        <h5 class="mt-0">
                            <a href="<?php echo get_post_permalink() ?>">
                                <?php the_title(); ?>
                            </a>
                        </h5>
                        <!-- <p class="text-muted">
                            Article by <?php // echo get_the_author(); ?>
                            <br>
                            Published <?php // echo get_the_date( 'd M, Y' ); ?>
                        </p> -->
                    </div>

                </div>
            
            <?php
        }
    }
    ?>
</div>