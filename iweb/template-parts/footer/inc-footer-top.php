<?php
//Global variable redux
global $iweb_options;

$iweb_footer_col     =   $iweb_options ["iweb_footer_column_col"];
$iweb_footer_widthl  =   $iweb_options ["iweb_footer_column_w1"];
$iweb_footer_width2  =   $iweb_options ["iweb_footer_column_w2"];
$iweb_footer_width3  =   $iweb_options ["iweb_footer_column_w3"];
$iweb_footer_width4  =   $iweb_options ["iweb_footer_column_w4"];

if( is_active_sidebar( 'iweb-footer-1' ) || is_active_sidebar( 'iweb-footer-2' ) || is_active_sidebar( 'iweb-footer-3' ) || is_active_sidebar( 'iweb-footer-4' ) ) :

?>

    <div class="site-footer__top">
        <div class="container">
            <div class="row">

                <?php

                for( $iweb_i = 0; $iweb_i < $iweb_footer_col; $iweb_i++ ):

                    $iweb_j = $iweb_i +1;

                    if ( $iweb_i == 0 ) :

                        $iweb_col = $iweb_footer_widthl;

                    elseif ( $iweb_i == 1 ) :

                        $iweb_col = $iweb_footer_width2;

                    elseif ( $iweb_i == 2 ) :

                        $iweb_col = $iweb_footer_width3;

                    else :

                        $iweb_col = $iweb_footer_width4;

                    endif;

                    if( is_active_sidebar("iweb-footer-".$iweb_j ) ):

                ?>

                        <div class="col-md-<?php echo esc_attr( $iweb_col ); ?>">

                            <?php dynamic_sidebar("iweb-footer-".$iweb_j); ?>

                        </div><!--end class footermenu-->

                <?php
                    endif;

                endfor;
                ?>

            </div>
        </div>
    </div>

<?php endif; ?>