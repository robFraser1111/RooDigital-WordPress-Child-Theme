<div class="row <?php echo esc_attr(block_value('className')); ?>">

    <?php
    $args = array(
        'post_type' => 'post',
        'category_name' => 'blog'
    );

    $post_query = new WP_Query($args);

    if ($post_query->have_posts()) {

        // Limit to 4 articles
        $count = 0;
        while ($post_query->have_posts() && $count < 4) {
            $post_query->the_post();
    ?>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100">
                    <a href="<?php echo get_post_permalink() ?>">
                        <?php the_post_thumbnail(array(600, 500), ['class' => 'card-img-top']); ?>
                    </a>
                    <div class="card-body">
                        <a href="<?php echo get_post_permalink() ?>">
                            <h2 class="card-title h5"><?php the_title(); ?></h2>
                        </a>
                    </div>
                </div>
                </a>
            </div>

    <?php
            $count++;
        }
    }
    ?>

</div>