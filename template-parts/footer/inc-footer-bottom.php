<?php
//Global variable redux
global $iweb_options;

$iweb_copyright    =   $iweb_options ["iweb_footer_copyright_editor"] == '' ? 'Copyright &amp; Templaza' : $iweb_options ["iweb_footer_copyright_editor"];

?>

<div class="site-footer__bottom">
    <div class="container">
        <div class="site-copyright-menu d-flex align-items-center">

            <div class="site-copyright">
                <p class="site-copyright_text">
                    <?php echo balanceTags( $iweb_copyright, true ); ?>
                </p>
            </div>

            <div class="site-footer__menu">
                <nav>

                    <?php

                    if ( has_nav_menu( 'footer-menu' ) ) :

                        wp_nav_menu( array(
                            'theme_location'    => 'footer-menu',
                            'menu_class'        => 'menu-footer',
                            'container'         =>  false,
                        ));

                    else:

                        ?>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','iweb' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif;?>

                </nav>
            </div>

        </div>
    </div>
</div>