<?php

$carpenter_video_post = get_post_meta(  get_the_ID() , 'carpenter_video_post', true );

if ( !empty( $carpenter_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $carpenter_video_post ); ?>
    </div>

<?php endif;?>