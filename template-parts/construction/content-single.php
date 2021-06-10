<?php

$images = rwmb_meta( 'carpenter_construction_gallery', array( 'size' => 'full' ) );

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-construction-single-item' ); ?>>
    <div class="site-post-content">
        <?php
        if ( $images ) :

            $carpenter_slider_settings = [
                'center' => true,
                'items' => 2,
                'loop' => true,
                'nav' => true,
                'dots' => true,
                'autoHeight' => true
            ];
        ?>

            <div class="site-post-slides owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $carpenter_slider_settings ); ?>'>

                <?php foreach( $images as $item ) : ?>

                    <div class="site-post-slides__item">
                        <?php echo wp_get_attachment_image( $item['ID'], 'full' ); ?>
                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' ); ?>

        <div class="container">
            <div class="site-content-warp mt-3">
                <h1 class="site-post-title mb-3">
                    <?php the_title(); ?>
                </h1>

                <div class="site-post-excerpt mb-5">
                    <?php
                    the_content();

                    carpenter_link_page();
                    ?>
                </div>

                <?php carpenter_post_share(); ?>
            </div>

            <?php get_template_part( 'template-parts/construction/content','related' ); ?>
        </div>
    </div>
</div>



