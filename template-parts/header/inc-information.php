<?php

global $iweb_options;

$iweb_information_address   =   $iweb_options['iweb_information_address'];
$iweb_information_mail      =   $iweb_options['iweb_information_mail'];
$iweb_information_phone     =   $iweb_options['iweb_information_phone'];

?>

<div class="information">
    <div class="container">
        <div class="row">

            <div class="col-md-7">

                <?php if ( $iweb_information_address != '' ) : ?>

                    <p class="information-address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $iweb_information_address ); ?>
                    </p>

                <?php

                endif;

                if ( !empty( $iweb_information_mail ) ) :

                ?>

                    <p class="information-mail">
                        <?php foreach ( $iweb_information_mail as $key => $iweb_information_mail_item ) : ?>
                            <span>
                                <?php echo esc_html( $iweb_information_mail_item ); ?>
                            </span>
                        <?php endforeach; ?>
                    </p>

                <?php

                endif;

                if ( !empty( $iweb_information_phone ) ) :

                ?>

                    <p class="information-phone">
                        <?php foreach ( $iweb_information_phone as $key => $iweb_information_phone_item ) : ?>
                            <span>
                                <?php echo esc_html( $iweb_information_phone_item ); ?>
                            </span>
                        <?php endforeach; ?>
                    </p>

                <?php endif; ?>

            </div>

            <div class="col-md-5">

                <?php iweb_get_social_url(); ?>

            </div>

        </div>
    </div>
</div>