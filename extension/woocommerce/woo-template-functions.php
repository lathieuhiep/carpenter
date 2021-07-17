<?php

/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action( 'after_setup_theme', 'carpenter_shop_setup' );

function carpenter_shop_setup() {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* Start limit product */
add_filter('loop_shop_per_page', 'carpenter_show_products_per_page');

function carpenter_show_products_per_page() {
    global $carpenter_options;

    $carpenter_product_limit = $carpenter_options['carpenter_product_limit'];

    return $carpenter_product_limit;

}
/* End limit product */

/* Start Change number or products per row */
add_filter('loop_shop_columns', 'carpenter_loop_columns_product');

function carpenter_loop_columns_product() {
    global $carpenter_options;

    $carpenter_products_per_row = $carpenter_options['carpenter_products_per_row'];

    if ( !empty( $carpenter_products_per_row ) ) :
        return $carpenter_products_per_row;
    else:
        return 4;
    endif;

}
/* End Change number or products per row */

/* Start get cart */
if ( ! function_exists( 'carpenter_get_cart' ) ):

    function carpenter_get_cart() {

    ?>

        <div class="cart-box d-flex align-items-center">
            <div class="cart-customlocation">
                <i class="fas fa-shopping-cart"></i>

                <span class="number-cart-product">
                     <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                </span>
            </div>
        </div>

    <?php
    }

endif;

/* To ajaxify your cart viewer */
add_filter( 'woocommerce_add_to_cart_fragments', 'carpenter_add_to_cart_fragment' );

if ( ! function_exists( 'carpenter_add_to_cart_fragment' ) ) :

    function carpenter_add_to_cart_fragment( $carpenter_fragments ) {

        ob_start();

        do_action( 'carpenter_woo_shopping_cart' );

        $carpenter_fragments['.cart-box'] = ob_get_clean();

        return $carpenter_fragments;

    }

endif;
/* End get cart */

/* Start Sidebar Shop */
if ( ! function_exists( 'carpenter_woo_get_sidebar' ) ) :

    function carpenter_woo_get_sidebar() {

	    global $carpenter_options;
	    $carpenter_sidebar_woo_position = $carpenter_options['carpenter_sidebar_woo'];


	    if( is_active_sidebar( 'carpenter-sidebar-wc' ) ):

	        if ( $carpenter_sidebar_woo_position == 'left' ) :
		        $class_order = 'order-md-1';
	        else:
		        $class_order = 'order-md-2';
	        endif;
    ?>

            <aside class="col-12 col-md-4 col-lg-3 order-2 <?php echo esc_attr( $class_order ); ?>">
                <?php dynamic_sidebar( 'carpenter-sidebar-wc' ); ?>
            </aside>

    <?php
        endif;
    }

endif;
/* End Sidebar Shop */

/*
* Lay Out Shop
*/

if ( ! function_exists( 'carpenter_woo_before_main_content' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function carpenter_woo_before_main_content() {
        global $carpenter_options;
        $carpenter_sidebar_woo_position = $carpenter_options['carpenter_sidebar_woo'];

    ?>

        <div class="site-shop">
            <div class="container">
                <div class="row">

                <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked carpenter_woo_sidebar - 10
                     */
                    do_action( 'carpenter_woo_sidebar' );

                ?>

                    <div class="<?php echo is_active_sidebar( 'carpenter-sidebar-wc' ) && $carpenter_sidebar_woo_position != 'hide' ? 'col-12 col-md-8 col-lg-9 order-1 has-sidebar' : 'col-md-12'; ?>">

    <?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_after_main_content' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function carpenter_woo_after_main_content() {
        global $carpenter_options;
        $carpenter_sidebar_woo_position = $carpenter_options['carpenter_sidebar_woo'];
    ?>

                    </div><!-- .col-md-9 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-shop -->

    <?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_product_thumbnail_open' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked carpenter_woo_product_thumbnail_open - 5
     */

    function carpenter_woo_product_thumbnail_open() {

?>

        <div class="site-shop__product--item-image">

<?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_product_thumbnail_close' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked carpenter_woo_product_thumbnail_close - 15
     */

    function carpenter_woo_product_thumbnail_close() {

        do_action( 'carpenter_woo_button_quick_view' );
?>

        </div><!-- .site-shop__product--item-image -->

        <div class="site-shop__product--item-content">

<?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_get_product_title' ) ) :
    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked carpenter_woo_get_product_title - 10
     */

    function carpenter_woo_get_product_title() {
    ?>
        <h2 class="woocommerce-loop-product__title">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php
    }
endif;

if ( ! function_exists( 'carpenter_woo_after_shop_loop_item_title' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked carpenter_woo_after_shop_loop_item_title - 15
     */
    function carpenter_woo_after_shop_loop_item_title() {
    ?>
        </div><!-- .site-shop__product--item-content -->
    <?php
    }
endif;

if ( ! function_exists( 'carpenter_woo_loop_add_to_cart_open' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked carpenter_woo_loop_add_to_cart_open - 4
     */

    function carpenter_woo_loop_add_to_cart_open() {
    ?>
        <div class="site-shop__product-add-to-cart">
    <?php
    }

endif;

if ( ! function_exists( 'carpenter_woo_loop_add_to_cart_close' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked carpenter_woo_loop_add_to_cart_close - 12
     */

    function carpenter_woo_loop_add_to_cart_close() {
    ?>
        </div><!-- .site-shop__product-add-to-cart -->
    <?php
    }

endif;

if ( ! function_exists( 'carpenter_woo_before_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked carpenter_woo_before_shop_loop_item - 5
     */
    function carpenter_woo_before_shop_loop_item() {
    ?>

        <div class="site-shop__product--item">

    <?php
    }
endif;

if ( ! function_exists( 'carpenter_woo_after_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked carpenter_woo_after_shop_loop_item - 15
     */
    function carpenter_woo_after_shop_loop_item() {
    ?>

        </div><!-- .site-shop__product--item -->

    <?php
    }
endif;

if ( ! function_exists( 'carpenter_woo_before_shop_loop_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked carpenter_woo_before_shop_loop_open - 5
     */
    function carpenter_woo_before_shop_loop_open() {

    ?>

        <div class="site-shop__result-count-ordering d-flex align-items-center justify-content-between">

    <?php
    }

endif;

if ( ! function_exists( 'carpenter_woo_before_shop_loop_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked carpenter_woo_before_shop_loop_close - 35
     */
    function carpenter_woo_before_shop_loop_close() {

    ?>

        </div><!-- .site-shop__result-count-ordering -->

    <?php
    }

endif;

/*
* Single Shop
*/

if ( ! function_exists( 'carpenter_woo_before_single_product' ) ) :

    /**
     * Before Content Single  product
     *
     * woocommerce_before_single_product hook.
     *
     * @hooked carpenter_woo_before_single_product - 5
     */

    function carpenter_woo_before_single_product() {

    ?>

        <div class="site-shop-single">

    <?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_after_single_product' ) ) :

    /**
     * After Content Single  product
     *
     * woocommerce_after_single_product hook.
     *
     * @hooked carpenter_woo_after_single_product - 30
     */

    function carpenter_woo_after_single_product() {

    ?>

        </div><!-- .site-shop-single -->

    <?php

    }

endif;

if ( !function_exists( 'carpenter_woo_before_single_product_summary_open_warp' ) ) :

    /**
     * Before single product summary
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked carpenter_woo_before_single_product_summary_open_warp - 1
     */

    function carpenter_woo_before_single_product_summary_open_warp() {

    ?>

        <div class="site-shop-single__warp">

    <?php

    }

endif;

if ( !function_exists( 'carpenter_woo_after_single_product_summary_close_warp' ) ) :

    /**
     * After single product summary
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked carpenter_woo_after_single_product_summary_close_warp - 5
     */

    function carpenter_woo_after_single_product_summary_close_warp() {

    ?>

        </div><!-- .site-shop-single__warp -->

    <?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_before_single_product_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked carpenter_woo_before_single_product_summary_open - 5
     */

    function carpenter_woo_before_single_product_summary_open() {

    ?>

        <div class="site-shop-single__gallery-box">

    <?php

    }

endif;

if ( ! function_exists( 'carpenter_woo_before_single_product_summary_close' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked carpenter_woo_before_single_product_summary_close - 30
     */

    function carpenter_woo_before_single_product_summary_close() {

    ?>

        </div><!-- .site-shop-single__gallery-box -->

    <?php

    }

endif;

/* Remove title page shop */
add_filter('woocommerce_show_page_title', '__return_false');

function carpenter_price_override( $price, $product ) {
    global $carpenter_options;
    $carpenter_products_link_contact = $carpenter_options['carpenter_products_link_contact'];

    if ( empty( $product->get_price() ) ) {
        /*
         * Replace the word "Free" with whatever text you would like. Also
         * remember to update the textdomain for translation if required.
         */
        $price = '<a class="contact" href="'. esc_url( $carpenter_products_link_contact ) .'">'. __( 'Liên hệ', 'carpenter' ) .'</a>';
    }

    return $price;
}
add_filter( 'woocommerce_get_price_html', 'carpenter_price_override', 100, 2 );