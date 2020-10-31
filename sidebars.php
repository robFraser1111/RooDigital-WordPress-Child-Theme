<?php

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {

    register_sidebar(
        array(
            'id'            => 'header',
            'name'          => __( 'Header' ),
            'description'   => __( 'Call to action area above the menu' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'id'            => 'sidebar-1',
            'name'          => __( 'Social' ),
            'description'   => __( 'Add social icons and contact details' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

}

?>