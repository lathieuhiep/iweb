<?php
/* function hook */
if ( function_exists( 'iweb_template_loop_item' ) ) :
    /* Loop template */
    function iweb_template_loop_item( $iweb_widget_elmentor_col_number ) {

        if ( $iweb_widget_elmentor_col_number == 4 ) :
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-6 col-md-3 col-lg-4 col-xl-3';
        elseif ( $iweb_widget_elmentor_col_number == 3 ) :
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-6 col-md-3 col-lg-4';
        elseif ( $iweb_widget_elmentor_col_number == 2 ):
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-6 col-md-6';
        else:
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-12 col-md-12';
        endif;

?>

        <div class="element-template__col <?php echo esc_attr( $iweb_widget_elmentor_class_col ); ?>">
            <div class="element-template__item">
                <a class="d-flex align-items-center justify-content-center" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>

                <div class="element-template__image-demo">
                    <?php the_post_thumbnail( 'medium_large' ); ?>
                </div>

                <h3 class="element-template__title-demo">
                    <?php the_title(); ?>
                </h3>
            </div>

        </div>

<?php
    }

endif;

/* Action */

add_action( 'iweb_template_loop', 'iweb_template_loop_item', 5, 1 );

/*
* Start ajax template
*/
add_action( 'wp_ajax_nopriv_iweb_template_load_item', 'iweb_template_load_item' );
add_action( 'wp_ajax_iweb_template_load_item', 'iweb_template_load_item' );

function iweb_template_load_item() {

    $iweb_temlate_column    =   $_POST['iweb_temlate_column'];
    $iweb_temlate_cat_id    =   $_POST['iweb_temlate_cat_id'];
    $iweb_temlate_limit     =   $_POST['iweb_temlate_limit'];
    $iweb_temlate_orderby   =   $_POST['iweb_temlate_orderby'];
    $iweb_temlate_order     =   $_POST['iweb_temlate_order'];

    if ( $iweb_temlate_column == 4 ) :
        $iweb_temlate_load_class_col =   'col-12 col-sm-6 col-md-3 col-lg-4 col-xl-3';
    elseif ( $iweb_temlate_column == 3 ) :
        $iweb_temlate_load_class_col =   'col-12 col-sm-6 col-md-3 col-lg-4';
    elseif ( $iweb_temlate_column == 2 ):
        $iweb_temlate_load_class_col =   'col-12 col-sm-6 col-md-6';
    else:
        $iweb_temlate_load_class_col =   'col-12 col-sm-12 col-md-12';
    endif;

    $iweb_widget_template_load_arg = array (

        'post_type'         =>  'template',
        'posts_per_page'    =>  $iweb_temlate_limit,
        'orderby'           =>  $iweb_temlate_orderby,
        'order'             =>  $iweb_temlate_order,
        'tax_query'         =>  array(
            array(
                'taxonomy'  =>  'template_cat',
                'field'     =>  'id',
                'terms'     =>  explode( ',', $iweb_temlate_cat_id )
            )
        )

    );

    $iweb_widget_template_load_query = new WP_Query( $iweb_widget_template_load_arg );

    while ( $iweb_widget_template_load_query -> have_posts() ) :
        $iweb_widget_template_load_query -> the_post();
        ?>

        <div class="element-template__col <?php echo esc_attr( $iweb_temlate_load_class_col ); ?>">
            <div class="element-template__item">
                <div class="element-template__image-demo">
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&nbsp;</a>

                    <?php the_post_thumbnail( 'full' ); ?>
                </div>

                <h3 class="element-template__title-demo">
                    <?php the_title(); ?>
                </h3>
            </div>
        </div>

    <?php

    endwhile;
    wp_reset_postdata();

    exit();
}