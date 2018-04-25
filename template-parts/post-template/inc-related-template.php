<?php

$iweb_cat_template  =   get_the_terms( get_the_ID(), 'template_cat' );

if ( !empty( $iweb_cat_template ) ) :

    $iweb_cat_template_arr = array();

    foreach ( $iweb_cat_template as $iweb_cat_template_item ) {
        $iweb_cat_template_arr[] = $iweb_cat_template_item->term_id;
    }

    $iweb_related_template_args = array(
        'post_type'         =>  'template',
        'posts_per_page'    =>  12,
        'post__not_in'      =>  array( get_the_ID() ),
        'tax_query'         =>  array(
            array(
                'taxonomy'  =>  'template_cat',
                'field'     =>  'id',
                'terms'     =>   $iweb_cat_template_arr
            )
        )
    );

    $iweb_related_template_query = new WP_Query( $iweb_related_template_args );

    if ( $iweb_related_template_query->have_posts() ) :

        $iweb_related_template_slider_settings  =   [
            'number_item'           =>  3,
            'margin_item'           =>  30,
            'loop'                  =>  false,
            'autoplay'              =>  false,
            'dots'                  =>  false,
            'nav'                   =>  false,
            'item_mobile'           =>  1,
            'margin_item_mobile'    =>  0,
            'item_tablet'           =>  3
        ];

?>

    <div class="relate-template-warp">
        <h4 class="relate-template__title">
            <?php esc_html_e( 'Những mẫu này có thể phù hợp với bạn',  'iweb' ); ?>
        </h4>

        <div class="relate-template__box owl-carousel owl-theme" data-settings='<?php echo esc_attr( wp_json_encode( $iweb_related_template_slider_settings ) ); ?>'>
            <?php
            while ( $iweb_related_template_query->have_posts() ) :
                $iweb_related_template_query->the_post();
            ?>

                <div id="relate-template__<?php the_ID(); ?>" class="relate-template__item">
                    <div class="relate-template__item--image">
                        <?php the_post_thumbnail( 'medium_large' ); ?>
                    </div>

                    <h4 class="relate-template__item--title">
                        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>

                    <?php if ( has_term( '', 'template_cat' ) ) : ?>

                        <div class="relate-template__item--meta">
                            <?php the_terms( get_the_ID(), 'template_cat' ); ?>
                        </div>

                    <?php endif; ?>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

<?php

    endif;

endif;