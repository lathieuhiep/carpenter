<?php

global $carpenter_options;

$carpenter_show_loading = $carpenter_options['carpenter_general_show_loading'] == '' ? '0' : $carpenter_options['carpenter_general_show_loading'];

if(  $carpenter_show_loading == 1 ) :

    $carpenter_loading_url  = $carpenter_options['carpenter_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $carpenter_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $carpenter_loading_url ); ?>" alt="<?php esc_attr_e('loading...','carpenter') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','carpenter') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>