/**
 * Quick view product
 */

( function( $ ) {

    "use strict";

    let mode_quick_view_product =   $( '.mode-quick-view-product' ),
        btn_quick_view_product  =   $( '.btn-quick-view-product' ),
        loading_body            =   $( '.loading-body' ),
        quick_view_product_body =   $( '.quick-view-product-body' );

    btn_quick_view_product.on( 'click', function (e) {

        e.preventDefault();

        let product_id              =   $(this).data( 'id-product' );

        $.ajax({

            url: woo_quick_view_product.url,
            type: 'POST',
            data: ({

                action: 'carpenter_get_quick_view_product',
                product_id: product_id

            }),

            beforeSend: function () {},

            success: function( data ){

                if ( data ){

                    quick_view_product_body.empty().append(data);
                    loading_body.fadeOut();

                }

                setTimeout( function() {



                }, 600 );

            }

        });


    } );

    mode_quick_view_product.on('hidden.bs.modal', function () {

        loading_body.fadeIn();
        quick_view_product_body.empty();

    })

} )( jQuery );