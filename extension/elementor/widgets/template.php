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

        $iweb_widget_elmentor_settings  =   $this->get_settings();

    ?>

        <div class="element-template">
            <h2 class="element-template__title element-title text-center text-uppercase">
                <?php echo esc_html( $iweb_widget_elmentor_settings['template_title'] ); ?>
            </h2>
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