<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class iweb_widget_introduces extends Widget_Base {

    public function get_categories() {
        return array( 'iweb-widgets' );
    }

    public function get_name() {
        return 'introduces-iweb';
    }

    public function get_title() {
        return esc_html__( 'Introduces', 'iweb' );
    }

    public function get_icon() {
        return 'fa fa-pencil-square-o';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Text', 'iweb' ),
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'label'         =>  esc_html__( 'Title', 'iweb' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Title Introduces', 'iweb' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_text_editor',
            [
                'label' => esc_html__( 'Text Editor', 'iweb' ),
            ]
        );

        $this->add_control(
            'widget_description',
            [
                'label'     =>  esc_html__( 'Description', 'iweb' ),
                'type'      =>  Controls_Manager::WYSIWYG,
                'default'   =>  esc_html__( 'Default description', 'iweb' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $iweb_widget_elmentor_settings  =   $this->get_settings();

    ?>

        <div class="element-introduces">
            <div class="element-introduces__icon"></div>
            <div class="element-introduces__box">
                <h2 class="element-introduces__title">
                    <?php echo esc_html( $iweb_widget_elmentor_settings['widget_title'] ); ?>
                </h2>

                <div class="element-introduces__content">
                    <?php echo wp_kses_post( $iweb_widget_elmentor_settings['widget_description'] ); ?>
                </div>
            </div>
        </div>

    <?php

    }

    protected function _content_template() {

    ?>

        <div class="element-introduces">
            <div class="element-introduces__icon"></div>
            <div class="element-introduces__box">
                <h2 class="element-introduces__title">
                    {{{ settings.widget_title }}}
                </h2>

                <div class="element-introduces__content">
                    {{{ settings.widget_description }}}
                </div>
            </div>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new iweb_widget_introduces );