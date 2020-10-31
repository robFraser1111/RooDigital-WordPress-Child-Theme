<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    // wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


// Allow svg uploads for Media Library
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }
add_action('upload_mimes', 'add_file_types_to_uploads');


// Adds a wrapper around the pages content
add_action('the_content','content_wrapper');
    function content_wrapper( $content ){
    return '<div class="inner-container">'.$content.'</div>';
}


/* Packages Post type
function packages() {
    $labels = array(
        'name'                  => _x( 'Packages', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Package', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Packages', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Package', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Package', 'textdomain' ),
        'new_item'              => __( 'New Package', 'textdomain' ),
        'edit_item'             => __( 'Edit Package', 'textdomain' ),
        'view_item'             => __( 'View Package', 'textdomain' ),
        'all_items'             => __( 'All Packages', 'textdomain' ),
        'search_items'          => __( 'Search Packages', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Packages:', 'textdomain' ),
        'not_found'             => __( 'No packages found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No packages found in Trash.', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter packags list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Packages list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Packages list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    ); 
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'package' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'revisions' ),
        'menu_icon'          => 'dashicons-cart',
    );
 
    register_post_type( 'package', $args );
}
 
add_action( 'init', 'packages' ); */


// Thumbnails for posts pages
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 250, true );

// Remove read more for excerpts
remove_filter('get_the_excerpt', 'wp_trim_excerpt');

// WooCommerce Functions
include_once("woocommerce-functions.php");

// Sidebars
include_once("sidebars.php");

// Theme settings page
include_once("theme-settings.php");

// Theme customizer
include_once("theme-customizer.php");

// Add Footer menu type
add_action( 'after_setup_theme', 'register_footer_menu' );
function register_footer_menu() {
    register_nav_menu( 'footer', __( 'Footer Menu', 'theme-text-domain' ) );
}