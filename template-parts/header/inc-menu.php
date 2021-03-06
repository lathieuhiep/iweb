<?php

    global $iweb_options;

    $iweb_logotype              =   $iweb_options['iweb_type_logo'] == '' ? 'logo_image' : $iweb_options['iweb_type_logo'];

?>
<header id="home" class="header">
    <nav id="navigation" class="navbar-expand-lg">
        <?php get_template_part( 'template-parts/header/inc', 'information' ); ?>

        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom_warp d-lg-flex align-items-center justify-content-lg-end">
                    <div class="site-logo">
                        <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">

                            <?php

                            if ( $iweb_logotype == 'logo_image' ) :

                                $iweb_img_url    =   $iweb_options['iweb_logo_images'];

                                if ( $iweb_img_url['url'] != '' ) :

                                    echo'<img src="'.esc_url( $iweb_img_url['url'] ).'" alt="'.get_bloginfo('title').'" />';
                                else :

                                    echo'<img src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';

                                endif;

                            else :

                                $iweb_text = $iweb_options['iweb_logo_name'];

                                echo ('<span class="tz-logo-text">'.esc_html($iweb_text).'</span>');

                            endif;

                            ?>

                        </a>

                        <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">

                        <?php

                        if ( has_nav_menu('primary') ) :

                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'navbar-nav',
                                'container'      => false,
                            ) ) ;

                        else:

                        ?>

                            <ul class="main-menu">
                                <li>
                                    <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                        <?php esc_html_e( 'ADD TO MENU','iweb' ); ?>
                                    </a>
                                </li>
                            </ul>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>