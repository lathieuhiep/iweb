<?php

$iweb_video = get_post_meta(  get_the_ID() , '_format_video_embed', true );

if ( $iweb_video != '' ):

?>

    <div class="site-post-video">

        <?php if(wp_oembed_get( $iweb_video )) : ?>

            <?php echo wp_oembed_get($iweb_video); ?>

        <?php else : ?>

            <?php echo balanceTags($iweb_video); ?>

        <?php endif; ?>

    </div>

<?php endif;?>