
<div class="row <?php echo block_value('className') ?>">

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="text-center">
                <img src="<?php block_field( 'image-1' ); ?>" />
            </div>
                <div class="carousel-caption d-md-block">
                <h5><?php block_field( 'title-1' ); ?></h5>
                <p><?php block_field( 'description-1' ); ?></p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="text-center">
                <img src="<?php block_field( 'image-2' ); ?>" />
            </div>
                <div class="carousel-caption d-md-block">
                <h5><?php block_field( 'title-2' ); ?></h5>
                <p><?php block_field( 'description-2' ); ?></p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="text-center">
                <img src="<?php block_field( 'image-3' ); ?>" />
            </div>
                <div class="carousel-caption d-md-block">
                <h5><?php block_field( 'title-3' ); ?></h5>
                <p><?php block_field( 'description-3' ); ?></p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="text-center">
                <img src="<?php block_field( 'image-4' ); ?>" />
            </div>
                <div class="carousel-caption d-md-block">
                <h5><?php block_field( 'title-4' ); ?></h5>
                <p><?php block_field( 'description-4' ); ?></p>
            </div>
        </div>

    </div>
</div>

</div>
