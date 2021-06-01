<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','basictheme_config_theme' );

        function basictheme_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $basictheme_options;
                    $basictheme_favicon = $basictheme_options['basictheme_favicon_upload']['url'];

                    if( $basictheme_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $basictheme_favicon ) . '" type="image/x-icon" />';

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

        add_action( 'wp_enqueue_scripts', 'basictheme_custom_css', 99 );

        function basictheme_custom_css() {

            global $basictheme_options;

            $basictheme_typo_selecter_1   =   $basictheme_options['basictheme_custom_typography_1_selector'];

            $basictheme_typo1_font_family   =   $basictheme_options['basictheme_custom_typography_1']['font-family'] == '' ? '' : $basictheme_options['basictheme_custom_typography_1']['font-family'];

            $basictheme_css_style = '';

            if ( $basictheme_typo1_font_family != '' ) :
                $basictheme_css_style .= ' '.esc_attr( $basictheme_typo_selecter_1 ).' { font-family: '.balanceTags( $basictheme_typo1_font_family, true ).' }';
            endif;

            if ( $basictheme_css_style != '' ) :
                wp_add_inline_style( 'basictheme-style', $basictheme_css_style );
            endif;

        }

    endif;
