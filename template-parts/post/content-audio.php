<?php

    $basictheme_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $basictheme_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $basictheme_audio ) ) : ?>

                <?php echo wp_oembed_get( $basictheme_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $basictheme_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>