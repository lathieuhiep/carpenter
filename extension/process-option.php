<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','carpenter_config_theme' );

        function carpenter_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $carpenter_options;
                    $carpenter_favicon = $carpenter_options['carpenter_favicon_upload']['url'];

                    if( $carpenter_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $carpenter_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'carpenter_custom_css', 99 );

        function carpenter_custom_css() {

            global $carpenter_options;

            $carpenter_typo_selecter_1   =   $carpenter_options['carpenter_custom_typography_1_selector'];

            $carpenter_typo1_font_family   =   $carpenter_options['carpenter_custom_typography_1']['font-family'] == '' ? '' : $carpenter_options['carpenter_custom_typography_1']['font-family'];

            $carpenter_css_style = '';

            if ( $carpenter_typo1_font_family != '' ) :
                $carpenter_css_style .= ' '.esc_attr( $carpenter_typo_selecter_1 ).' { font-family: '.balanceTags( $carpenter_typo1_font_family, true ).' }';
            endif;

            if ( $carpenter_css_style != '' ) :
                wp_add_inline_style( 'carpenter-style', $carpenter_css_style );
            endif;

        }

    endif;
