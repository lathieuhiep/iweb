<?php

    $iweb_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $iweb_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $iweb_audio ) ) : ?>

                <?php echo wp_oembed_get( $iweb_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $iweb_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>