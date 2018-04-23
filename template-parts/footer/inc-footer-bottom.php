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

            <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

                <div class="site-footer__menu">
                    <nav>
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'footer-menu',
                                'menu_class'        => 'menu-footer',
                                'container'         =>  false,
                            ));
                         ?>
                    </nav>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>