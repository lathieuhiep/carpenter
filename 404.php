<?php
get_header();

global $carpenter_options;

$carpenter_title = $carpenter_options['carpenter_404_title'];
$carpenter_content = $carpenter_options['carpenter_404_editor'];
$carpenter_background = $carpenter_options['carpenter_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $carpenter_background ) ):
                        echo wp_get_attachment_image( $carpenter_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $carpenter_title != '' ):
                        echo esc_html( $carpenter_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'carpenter' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $carpenter_content != '' ) :
                        echo wp_kses_post( $carpenter_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'carpenter' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'carpenter' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'carpenter' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'carpenter'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'carpenter'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>