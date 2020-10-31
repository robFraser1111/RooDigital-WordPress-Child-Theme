<?php

// Removes all WooCommerce styling
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Empty cart before adding new product
add_filter( 'woocommerce_add_to_cart_validation', 'remove_cart_item_before_add_to_cart', 20, 3 );
function remove_cart_item_before_add_to_cart( $passed, $product_id, $quantity ) {
    if( ! WC()->cart->is_empty() )
        WC()->cart->empty_cart();
    return $passed;
}


add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = wc_get_checkout_url();
 return $checkout_url;
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

// Removes a tags around Title and Description
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


function product_content() {
    the_content();
}
add_action( 'woocommerce_after_shop_loop_item_title', 'product_content', 15 );




// Remove default title and add new styled title and description
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

function title_and_excerpt() {

    echo '<div class="card-header pt-4 pb-4"><span class="text-center">';

    echo '<p class="' . 'h2 mb-4' . '">' . get_the_title() . '</p>';
    echo '<p><strong>Suitable for:</strong></p>';
    the_excerpt();

    echo '</span></div>';

}
add_action( 'woocommerce_shop_loop_item_title', 'title_and_excerpt', 0 );


// Remove default Rating and Price and add new Price and Features
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );




function price_and_features_open() {

    echo '<div class="card-body"><p class="h1 card-title text-center mt-3 mb-4">';




}

function price_and_features_close() {




    echo '</p></div>';

}


add_action( 'woocommerce_after_shop_loop_item_title', 'price_and_features_open', 0 );
add_action( 'woocommerce_after_shop_loop_item', 'price_and_features_close', 15);










?>