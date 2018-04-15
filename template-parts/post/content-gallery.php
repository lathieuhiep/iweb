<?php

$iweb_gallery = get_post_meta(  get_the_ID() , '_format_gallery_images', true );

if( $iweb_gallery != '' ) :

?>

    <div class="site-post-slides owl-carousel owl-theme">

            <?php

            foreach($iweb_gallery as $iweb_image) :

                $iweb_image_src = wp_get_attachment_image_src( $iweb_image, 'full-thumb' );

                $iweb_caption = get_post_field('post_excerpt', $iweb_image);
            ?>

                <div class="site-post-slides__item">

                    <img src="<?php echo esc_url($iweb_image_src[0]); ?>" <?php echo ( $iweb_caption != '' ? 'title="' . esc_attr( $iweb_caption ) . '"' : '' ); ?> alt="<?php echo sanitize_title(get_the_title())?>"/>
                </div>

            <?php endforeach; ?>

    </div>

<?php endif; ?>