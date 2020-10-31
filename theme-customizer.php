<?php 
    function wpb_customize_register($wp_customize) {
        // Hero image
        $wp_customize->add_section('hero', array(
            'title'             => __('Hero', 'RooDigital'),
            'description'       => sprintf(__('Custom hero image', 'RooDigital')),
            'priority'          => 130
        ));

        $wp_customize->add_setting('hero_image', array(
            'default'           => '',
            'type'              => 'theme_mod'
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
            'label'             => __('Hero Image', 'RooDigital'),
            'section'           => 'hero',
            'settings'          => 'hero_image',
            'priority'          => 1
        )));
    }

    add_action('customize_register', 'wpb_customize_register');

