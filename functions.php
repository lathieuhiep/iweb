<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 *constants
 */
if( !function_exists('iweb_setup') ):

    function iweb_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'iweb', get_parent_theme_file_path( '/languages' ) );

        /**
         * plazart theme setup.
         *
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        //Enable support for Header (tz-demo)
        add_theme_support( 'custom-header' );

        //Enable support for Background (tz-demo)
        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary','Primary Menu');
        register_nav_menu('footer-menu','Footer Menu');

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*  Post Type   */
        add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', iweb_fonts_url()) );
    }

    add_action( 'after_setup_theme', 'iweb_setup' );

endif;

/*
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/tz-process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
    /*
     * Required: Meta Box Framework
     */
    require get_parent_theme_file_path( '/extension/meta-box/meta-box-options.php' );
}

if ( ! function_exists( 'iweb_check_rwmb_meta' ) ) {
    function iweb_check_rwmb_meta( $iweb_rwmb_metakey, $iweb_opt_args = '', $iweb_rwmb_post_id = null ) {
        return false;
    }
}

if ( ! function_exists( '_is_elementor_installed' ) ) :
    /*
     * Required: Elementor
     */
    require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

if ( class_exists('Woocommerce') ) :
    /*
     * Required: Woocommerce
     */
    require get_parent_theme_file_path( '/extension/woocommerce/hooks.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/functions.php' );

endif;


/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'iweb_widgets_init');

function iweb_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'iweb'),
        'id'            => 'iweb-sidebar',
        'description'   => esc_html__( 'Display sidebar right or left on all page.', 'iweb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'iweb' ),
        'id'            => 'iweb-footer-1',
        'description'   => esc_html__( 'Display footer column 1 on all page.', 'iweb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'iweb' ),
        'id'            => 'iweb-footer-2',
        'description'   => esc_html__( 'Display footer column 2 on all page.', 'iweb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'iweb' ),
        'id'            => 'iweb-footer-3',
        'description'   => esc_html__( 'Display footer column 3 on all page.', 'iweb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'iweb' ),
        'id'            => 'iweb-footer-4',
        'description'   => esc_html__( 'Display footer column 4 on all page.', 'iweb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'iweb_register_back_end_scripts');

function iweb_register_back_end_scripts(){

    /* Start Get CSS Admin */
    wp_enqueue_style( 'iweb-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'iweb_register_front_end');

function iweb_register_front_end() {

    /*
    * Start Get Css Front End
    * */

    /* Start Bootstrap Css */
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ), array(), '4.0.0' );
    /* End Bootstrap Css */

    /* Start Font Awesome */
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ), array(), '4.7.0' );
    /* End Font Awesome */

    /* Start Font */
    wp_enqueue_style( 'iweb-fonts', iweb_fonts_url(), array(), null );
    /* End Font */

    /* Start flex slider */
    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() || is_home() ){

        /* Start Carousel Css */
        wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/css/owl.carousel.min.css' ), array(), '2.2.1' );
        wp_enqueue_style( 'owl-theme-default', get_theme_file_uri( '/css/owl.theme.default.min.css' ), array(), '2.2.1' );
        /* End Carousel Css */

    }
    /* End flex slider */

    /*  Start Style Css   */
    wp_enqueue_style( 'iweb-style', get_stylesheet_uri() );
    /*  Start Style Css   */

    /*
    * End Get Css Front End
    * */


    /*
    * Start Get Js Front End
    * */

    // Load the html5 shiv.

    wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.0' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/js/bootstrap.min.js' ), array('jquery'), '4.0.0', true );

    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() || is_home()){

        /* Start Carousel Js */
        wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/js/owl.carousel.min.js' ), array(), '2.2.1', true );
        /* End Carousel Js */

    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'iweb-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );

    /*
   * End Get Js Front End
   * */

}

/**
 * Show full editor
 */
if ( !function_exists('iweb_ilc_mce_buttons') ) :

    function iweb_ilc_mce_buttons( $iweb_buttons_TinyMCE ) {

        array_push( $iweb_buttons_TinyMCE,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );

        return $iweb_buttons_TinyMCE;

    }

    add_filter("mce_buttons_2", "iweb_ilc_mce_buttons");

endif;

// Start Customize mce editor font sizes
if ( ! function_exists( 'iweb_mce_text_sizes' ) ) :

    function iweb_mce_text_sizes( $iweb_font_size_text ){
        $iweb_font_size_text['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $iweb_font_size_text;
    }

    add_filter( 'tiny_mce_before_init', 'iweb_mce_text_sizes' );

endif;
// End Customize mce editor font sizes

/* callback comment list */
function iweb_comments( $iweb_comment, $iweb_comment_args, $iweb_comment_depth ) {

    if ( 'div' === $iweb_comment_args['style'] ) :

        $iweb_comment_tag       = 'div';
        $iweb_comment_add_below = 'comment';

    else :

        $iweb_comment_tag       = 'li';
        $iweb_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $iweb_comment_tag ?> <?php comment_class( empty( $iweb_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $iweb_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $iweb_comment_args['avatar_size'] != 0 ) echo get_avatar( $iweb_comment, $iweb_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $iweb_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'iweb' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'iweb' ) ); ?>

            <?php comment_reply_link( array_merge( $iweb_comment_args, array( 'add_below' => $iweb_comment_add_below, 'depth' => $iweb_comment_depth, 'max_depth' => $iweb_comment_args['max_depth'] ) ) ); ?>

        </div>
        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $iweb_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

if ( ! function_exists( 'iweb_fonts_url' ) ) :

    function iweb_fonts_url() {
        $iweb_fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $iweb_font_google = _x( 'on', 'Raleway font: on or off', 'iweb' );

        if ( 'off' !== $iweb_font_google ) {
            $iweb_font_families = array();

            if ( 'off' !== $iweb_font_google ) {
                $iweb_font_families[] = 'Raleway:300,400,700';
            }

            $iweb_query_args = array(
                'family' => urlencode( implode( '|', $iweb_font_families ) ),
                'subset' => urlencode( 'latin' ),
            );

            $iweb_fonts_url = add_query_arg( $iweb_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $iweb_fonts_url );
    }

endif;

/*
 * Content Nav
 */

if ( ! function_exists( 'iweb_comment_nav' ) ) :

    function iweb_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php _e( 'Comment navigation', 'iweb' ); ?>
                </h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'iweb' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'iweb' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/*
 * TWITTER AMPERSAND ENTITY DECODE
 */
if( ! function_exists( 'iweb_social_title' )):

    function iweb_social_title( $iweb_title ) {

        $iweb_title = html_entity_decode( $iweb_title );
        $iweb_title = urlencode( $iweb_title );

        return $iweb_title;

    }

endif;

/****************************************************************************************************************
 * Fuction override post_class()
 * */

if ( ! function_exists( 'iweb_post_classes' ) ) :

    function iweb_post_classes( $iweb_body_class ) {

        if ( is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home() ) {
            $iweb_body_class[] = 'site-post-item';
        }

        if ( is_single() ) {
            $iweb_body_class[] = 'site-post-single-item';
        }
        return $iweb_body_class;

    }

    add_filter( 'post_class', 'iweb_post_classes' );

endif;

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_parent_theme_file_path( '/plugins/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'iweb_register_required_plugins' );
function iweb_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $iweb_plugins = array(

        array(
            'name'     				=>  'Vafpress Post Formats UI', // The plugin name
            'slug'     				=>  'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
            'source'   				=>  get_parent_theme_file_path( '/plugins/vafpress-post-formats-ui-develop.zip' ), // The plugin source
            'required' 				=>  true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=>  '1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=>  false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=>  false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=>  '', // If set, overrides default API URL and points to an external URL
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Redux Framework',
            'slug'      =>  'redux-framework',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Meta Box',
            'slug'      =>  'meta-box',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Elementor',
            'slug'      =>  'elementor',
            'required'  =>  true,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $iweb_config = array(
        'id'           => 'iweb',          // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $iweb_plugins, $iweb_config );
}

/* Start Social Network */
function iweb_get_social_url() {

    global $iweb_options;
    $iweb_social_networks = iweb_get_social_network();

?>

    <ul class="site-social d-flex">

        <?php
        foreach( $iweb_social_networks as $iweb_social ) :

            $iweb_social_url = $iweb_options['iweb_social_network_' . $iweb_social['id']];

            if( $iweb_social_url ) :

        ?>

                <li>
                    <a href="<?php echo esc_url( $iweb_social_url ); ?>">
                        <i class="fa fa-<?php echo esc_attr( $iweb_social['id'] ); ?>" aria-hidden="true"></i>
                    </a>
                </li>

        <?php
            endif;

        endforeach;
        ?>

    </ul>

<?php

}

function iweb_get_social_network() {
    return array(

        array('id' => 'facebook', 'title' => 'Facebook'),
        array('id' => 'twitter', 'title' => 'Twitter'),
        array('id' => 'google-plus', 'title' => 'Google Plus'),
        array('id' => 'linkedin', 'title' => 'linkedin'),
        array('id' => 'pinterest', 'title' => 'Pinterest'),
        array('id' => 'youtube', 'title' => 'Youtube'),
        array('id' => 'instagram', 'title' => 'instagram'),
        array('id' => 'vimeo', 'title' => 'Vimeo'),

    );
}
/* End Social Network */

/* Start pagination */
function iweb_pagination() {

    the_posts_pagination( array(
        'type' => 'list',
        'mid_size' => 2,
        'prev_text' => esc_html__( 'Previous', 'iweb' ),
        'next_text' => esc_html__( 'Next', 'iweb' ),
        'screen_reader_text' => esc_html__( '&nbsp;', 'iweb' ),
    ) );

}

function iweb_sanitize_pagination( $iweb_content ) {
    // Remove role attribute
    $iweb_content = str_replace('role="navigation"', '', $iweb_content);

    // Remove h2 tag
    $iweb_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $iweb_content);

    return $iweb_content;
}

add_action('navigation_markup_template', 'iweb_sanitize_pagination');
/* End pagination */