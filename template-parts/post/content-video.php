<?php

$basictheme_video_post = get_post_meta(  get_the_ID() , 'basictheme_video_post', true );

if ( !empty( $basictheme_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $basictheme_video_post ); ?>
    </div>

<?php endif;?>