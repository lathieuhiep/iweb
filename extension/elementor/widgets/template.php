<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class iweb_widget_template extends Widget_Base {

    public function __construct(array $data = [], array $args = null)
    {
        parent::__construct($data, $args);

        $this->admin_enqueue_scripts();
    }

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

    public function admin_enqueue_scripts() {

        /* Start Element Template js */

        $iweb_template_admin_url  =   admin_url('admin-ajax.php');
        $iweb_template_get        =   array( 'url' => $iweb_template_admin_url );
        wp_localize_script( 'element-template', 'iweb_template_load', $iweb_template_get );

        wp_enqueue_script( 'element-template', get_theme_file_uri( '/js/element-template.js' ), array(), '', true );
        /* End Element Template js */

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

        $this->start_controls_section(
            'section_button',
            [
                'label' => esc_html__( 'Button', 'iweb' ),
            ]
        );

        $this->add_control(
            'text_button',
            [
                'label'         =>  esc_html__( 'Text Button', 'iweb' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Xem thêm', 'iweb' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     =>  esc_html__( 'Button Link', 'iweb' ),
                'type'      =>  Controls_Manager::URL,
                'default'   =>  [
                    'url'           =>  'http://',
                    'is_external'   =>  '',
                ],
                'show_external' => true, // Show the 'open in new tab' button.
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $iweb_widget_elmentor_settings          =   $this->get_settings();
        $iweb_widget_elmentor_col_number        =   $iweb_widget_elmentor_settings['template_column_number'];
        $iweb_widget_elmentor_cat_select        =   $iweb_widget_elmentor_settings['template_select_cat'];
        $iweb_widget_elmentor_limit             =   $iweb_widget_elmentor_settings['template_limit'];
        $iweb_widget_elmentor_order_by          =   $iweb_widget_elmentor_settings['template_order_by'];
        $iweb_widget_elmentor_order             =   $iweb_widget_elmentor_settings['template_order'];

        $iweb_widget_elmentor_btn_text          =   $iweb_widget_elmentor_settings['text_button'];
        $iweb_widget_elmentor_btn_link          =   $iweb_widget_elmentor_settings['link'];
        $iweb_widget_elmentor_btn_link_url      =   $iweb_widget_elmentor_btn_link['url'];
        $iweb_widget_elmentor_btn_link_target   =   $iweb_widget_elmentor_btn_link['is_external'] ? 'target="_blank"' : '';

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
            'column'    =>  $iweb_widget_elmentor_col_number
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

                    <div class="loader_box">
                        <div class="loader_product_ajax"></div>
                    </div>

                    <?php if ( !empty( $iweb_template_get_cat ) ) : ?>

                        <div class="element-template__btn--cat text-center" data-settings='<?php echo esc_attr( wp_json_encode( $iweb_template_settings ) ); ?>'>
                            <button class="element-template__btn--filter active" data-cat-id="<?php echo esc_attr( implode(",", $iweb_template_get_cat_id ) ); ?>">
                                <?php esc_html_e( 'Tất cả',  'iweb' ); ?>
                            </button>

                            <?php foreach ( $iweb_template_get_cat as $iweb_template_get_cat_item ) : ?>

                                <button class="element-template__btn--filter" data-cat-id="<?php echo esc_attr( $iweb_template_get_cat_item -> term_id ); ?>">
                                    <?php echo esc_attr( $iweb_template_get_cat_item -> name ); ?>
                                </button>

                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>

                    <div class="element-template__row row">

                        <?php
                        while ( $iweb_widget_template_query -> have_posts() ) :
                            $iweb_widget_template_query -> the_post();

                            do_action( 'iweb_template_loop', $iweb_widget_elmentor_class_col );

                        endwhile;
                        wp_reset_postdata();
                        ?>

                    </div>

                    <?php if ( !empty( $iweb_widget_elmentor_btn_text ) ) : ?>
                        <div class="element-template__btn--link text-center">
                            <a href="<?php echo esc_url( $iweb_widget_elmentor_btn_link_url ); ?>" title="<?php echo esc_attr( $iweb_widget_elmentor_btn_text ); ?>" <?php echo esc_attr( $iweb_widget_elmentor_btn_link_target ); ?>>
                                <?php echo esc_html( $iweb_widget_elmentor_btn_text ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endif; ?>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new iweb_widget_template );