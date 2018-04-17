<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class iweb_widget_template extends Widget_Base {

    public function get_categories() {
        return array( 'iweb-widgets' );
    }

    public function get_name() {
        return 'template-iweb';
    }

    public function get_title() {
        return esc_html__( 'Template', 'iweb' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_template',
            [
                'label' => esc_html__( 'Template', 'iweb' ),
            ]
        );

        $this->add_control(
            'template_title',
            [
                'label'         =>  esc_html__( 'Title', 'iweb' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Mẫu giao diện website', 'iweb' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'template_column_number',
            [
                'label'     =>  esc_html__( 'Column', 'iweb' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  3,
                'options'   =>  [
                    4   =>  esc_html__( '4 Column', 'iweb' ),
                    3   =>  esc_html__( '3 Column', 'iweb' ),
                    2   =>  esc_html__( '2 Column', 'iweb' ),
                    1   =>  esc_html__( '1 Column', 'iweb' ),
                ],
            ]
        );

        $this->add_control(
            'template_select_cat',
            [
                'label'         =>  esc_html__( 'Category Template', 'iweb' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  iweb_check_get_cat( 'template_cat' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'template_limit',
            [
                'label'     =>  esc_html__( 'Limit', 'iweb' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  12,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'template_order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'iweb' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'    =>  esc_html__( 'ID', 'iweb' ),
                    'name'  =>  esc_html__( 'Name', 'iweb' ),
                    'date'  =>  esc_html__( 'Date', 'iweb' ),
                ],
            ]
        );

        $this->add_control(
            'template_order',
            [
                'label'     =>  esc_html__( 'Order', 'iweb' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'ASC', 'iweb' ),
                    'DESC'  =>  esc_html__( 'DESC', 'iweb' ),
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $iweb_widget_elmentor_settings      =   $this->get_settings();
        $iweb_widget_elmentor_col_number    =   $iweb_widget_elmentor_settings['template_column_number'];
        $iweb_widget_elmentor_cat_select    =   $iweb_widget_elmentor_settings['template_select_cat'];
        $iweb_widget_elmentor_limit         =   $iweb_widget_elmentor_settings['template_limit'];
        $iweb_widget_elmentor_order_by      =   $iweb_widget_elmentor_settings['template_order_by'];
        $iweb_widget_elmentor_order         =   $iweb_widget_elmentor_settings['template_order'];

        if ( $iweb_widget_elmentor_col_number == 4 ) :
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-6 col-md-3 col-lg-4 col-xl-3';
        elseif ( $iweb_widget_elmentor_col_number == 3 ) :
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-6 col-md-3 col-lg-4';
        elseif ( $iweb_widget_elmentor_col_number == 2 ):
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-6 col-md-6';
        else:
            $iweb_widget_elmentor_class_col =   'col-12 col-sm-12 col-md-12';
        endif;

        $iweb_template_settings =   [
            'limit'     =>  $iweb_widget_elmentor_limit,
            'orderby'   =>  $iweb_widget_elmentor_order_by,
            'order'     =>  $iweb_widget_elmentor_order,
        ];

        if ( !empty( $iweb_widget_elmentor_cat_select ) ) :

            $iweb_template_get_cat  = get_terms( array(
                'taxonomy'  =>  'template_cat',
                'include'   =>  $iweb_widget_elmentor_cat_select
            ) );

            $iweb_widget_template_arg = array (

                'post_type'         =>  'template',
                'posts_per_page'    =>  $iweb_widget_elmentor_limit,
                'orderby'           =>  $iweb_widget_elmentor_order_by,
                'order'             =>  $iweb_widget_elmentor_order,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'  =>  'template_cat',
                        'field'     =>  'id',
                        'terms'     =>  $iweb_widget_elmentor_cat_select
                    )
                )

            );

        else:

            $iweb_template_get_cat  =   get_terms( 'template_cat' );

            $iweb_widget_template_arg = array (

                'post_type'         =>  'template',
                'posts_per_page'    =>  $iweb_widget_elmentor_limit,
                'orderby'           =>  $iweb_widget_elmentor_order_by,
                'order'             =>  $iweb_widget_elmentor_order,

            );

        endif;

        $iweb_widget_template_query = new \ WP_Query( $iweb_widget_template_arg );

        $iweb_template_get_cat_id = array();

        if ( !empty( $iweb_template_get_cat ) ) :

            foreach ( $iweb_template_get_cat as $iweb_template_get_cat_item ) :

                $iweb_template_get_cat_id[]  =   $iweb_template_get_cat_item -> term_id;

            endforeach;

        endif;

    ?>

        <div class="element-template">
            <h2 class="element-template__title element-title text-center text-uppercase">
                <?php echo esc_html( $iweb_widget_elmentor_settings['template_title'] ); ?>
            </h2>

            <?php if ( $iweb_widget_template_query -> have_posts() ) : ?>

                <div class="element-template__container">

                    <?php if ( !empty( $iweb_template_get_cat ) ) : ?>

                        <div class="element-template__btn--cat text-center" data-settings='<?php echo esc_attr( wp_json_encode( $iweb_template_settings ) ); ?>'>
                            <button class="element-template__btn--filter" data-cat-id="<?php echo esc_attr( implode(",", $iweb_template_get_cat_id ) ); ?>">
                                <?php esc_html_e( 'Tất cả',  'iweb' ); ?>
                            </button>

                            <?php foreach ( $iweb_template_get_cat as $iweb_template_get_cat_item ) : ?>

                                <button class="element-template__btn--filter" data-cat-id="<?php echo esc_attr( $iweb_template_get_cat_item -> term_id ); ?>">
                                    <?php echo esc_attr( $iweb_template_get_cat_item -> name ); ?>
                                </button>

                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>

                    <div class="row">

                        <?php
                        while ( $iweb_widget_template_query -> have_posts() ) :
                            $iweb_widget_template_query -> the_post();
                        ?>

                            <div class="<?php echo esc_attr( $iweb_widget_elmentor_class_col ); ?>">
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
                        ?>

                    </div>
                </div>

            <?php endif; ?>
        </div>

    <?php

    }

    protected function _content_template() {

    ?>

        <div class="element-template">
            <h2 class="element-template__title element-title text-center text-uppercase">
                {{{ settings.template_title }}}
            </h2>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new iweb_widget_template );