<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action('wp_head','iweb_config_theme');

        function iweb_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $iweb_options;
                    $iweb_favicon = $iweb_options['iweb_favicon_upload']['url'];

                    if( $iweb_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url($iweb_favicon) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @since Plazart Theme 1.1
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'iweb_custom_css', 99 );

        function iweb_custom_css() {

            global $iweb_options;

            $iweb_typo_selecter_1   =   $iweb_options['iweb_custom_typography_1_selector'];

            $iweb_typo1_font_family   =   $iweb_options['iweb_custom_typography_1']['font-family'] == '' ? '' : $iweb_options['iweb_custom_typography_1']['font-family'];

            $iweb_css_style = '';

            if ( $iweb_typo1_font_family != '' ) :
                $iweb_css_style .= ' '.esc_attr( $iweb_typo_selecter_1 ).' { font-family: '.balanceTags( $iweb_typo1_font_family, true ).' }';
            endif;

            if ( $iweb_css_style != '' ) :
                wp_add_inline_style( 'iweb-style', $iweb_css_style );
            endif;

        }

    endif;
