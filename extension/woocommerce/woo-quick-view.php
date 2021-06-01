<?php

/*
* Start quick view product
*/
function carpenter_button_quick_view() {

?>

    <a class="btn-quick-view-product" href="#" title="<?php esc_attr_e( 'Quick view product', 'carpenter' ); ?>" data-id-product="<?php echo esc_attr( get_the_ID() ); ?>" data-toggle="modal" data-target="#mode-quick-view-product">
        <i class="fas fa-search"></i>
    </a>

<?php

}

function carpenter_popup_quick_view_product() {

?>

    <div class="modal fade mode-quick-view-product" id="mode-quick-view-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="loading-body">
                        <div class="icon-loading"></div>
                    </div>
                    <div class="quick-view-product-body"></div>
                </div>
            </div>
        </div>
    </div>

<?php

}

/* Start ajax quick view product */
add_action( 'wp_ajax_nopriv_carpenter_get_quick_view_product', 'carpenter_get_quick_view_product' );
add_action( 'wp_ajax_carpenter_get_quick_view_product', 'carpenter_get_quick_view_product' );

function carpenter_get_quick_view_product() {

    $product_id   =   $_POST['product_id'];

    $args = array(
	    'post_type' =>  'product',
        'post__in'  =>  array( $product_id )
    );

	$query = new WP_Query( $args );

	while ( $query->have_posts() ): $query->the_post();
?>

    <div class="item-product">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="item-product-img">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="content_product_detail">
                    <h1 class="title-product">
                        <?php the_title(); ?>
                    </h1>

                    <div class="item-rating">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>

                    <?php woocommerce_template_single_excerpt(); ?>

                    <div class="item-price">
                        <?php woocommerce_template_loop_price(); ?>
                    </div>

                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
	endwhile; wp_reset_postdata();
    wp_die();

}