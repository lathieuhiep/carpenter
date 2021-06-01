<?php

    $carpenter_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $carpenter_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $carpenter_audio ) ) : ?>

                <?php echo wp_oembed_get( $carpenter_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $carpenter_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>