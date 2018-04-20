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
            'section_icon',
            [
                'label' =>  esc_html__( 'Icon Box', 'iweb' ),
            ]
        );

        $this->add_control(
            'select_type_icon',
            [
                'label'     =>  esc_html__( 'Select Type Icon', 'iweb' ),
                'type'      =>  Controls_Manager::SELECT,
                'options'   =>  [
                    'image' =>  esc_html__( 'Image Icon', 'iweb' ),
                    'icon'  =>  esc_html__( 'Icon', 'iweb' ),
                ],
                'default'       =>  'image',
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'label'     =>  esc_html__( 'Choose Image Icon', 'iweb' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
                'condition' =>  [
                    'select_type_icon'  =>  'image',
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'     =>  esc_html__( 'Choose Icon', 'iweb' ),
                'type'      =>  Controls_Manager::ICON,
                'default'   =>  'fa fa-desktop',
                'condition' =>  [
                    'select_type_icon'  =>  'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     =>  esc_html__( 'Icon Color', 'iweb' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-introduces__font--icon' => 'color: {{VALUE}}',
                ],
                'condition' =>  [
                    'select_type_icon'  =>  'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'Title', 'iweb' ),
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

        $this->add_control(
            'title_html_tag',
            [
                'label'     =>  esc_html__( 'Title HTML Tag', 'iweb' ),
                'type'      =>  Controls_Manager::SELECT,
                'options'   =>  [
                    'h1'    =>  'H1',
                    'h2'    =>  'H2',
                    'h3'    =>  'H3',
                    'h4'    =>  'H4',
                    'h5'    =>  'H5',
                    'h6'    =>  'H6',
                ],
                'default'   =>  'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     =>  esc_html__( 'Title Color', 'iweb' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-introduces__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_text_editor',
            [
                'label' =>  esc_html__( 'Text Editor', 'iweb' ),
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

        $this->start_controls_section(
            'section_link',
            [
                'label' => esc_html__( 'Link', 'iweb' ),
            ]
        );

        $this->add_control(
            'text_link',
            [
                'label'         =>  esc_html__( 'Text Link', 'iweb' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( '', 'iweb' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     =>  esc_html__( 'Link', 'iweb' ),
                'type'      =>  Controls_Manager::URL,
                'default'   =>  [
                    'url'           =>  '#',
                    'is_external'   =>  '',
                ],
                'show_external' => true, // Show the 'open in new tab' button.
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $iweb_widget_elmentor_settings  =   $this->get_settings();

        $iweb_widget_elmentor_text_link         =   $iweb_widget_elmentor_settings['text_link'];
        $iweb_widget_elmentor_link_text         =   $iweb_widget_elmentor_settings['link'];
        $iweb_widget_elmentor_link_text_url     =   $iweb_widget_elmentor_link_text['url'];
        $iweb_widget_elmentor_link_text_target  =   $iweb_widget_elmentor_link_text['is_external'] ? 'target="_blank"' : '';

    ?>

        <div class="element-introduces d-md-flex">
            <div class="element-introduces__icon">
                <?php
                if ( $iweb_widget_elmentor_settings['select_type_icon'] == 'image' ) :

                    echo wp_get_attachment_image( $iweb_widget_elmentor_settings['image_icon']['id'], 'full' );

                else:

                ?>
                    <i class="element-introduces__font--icon <?php echo esc_attr( $iweb_widget_elmentor_settings['icon'] ); ?>" aria-hidden="true"></i>
                <?php endif; ?>
            </div>

            <div class="element-introduces__box">
                <<?php echo esc_attr( $iweb_widget_elmentor_settings['title_html_tag'] ); ?> class="element-introduces__title element-title">
                    <?php echo esc_html( $iweb_widget_elmentor_settings['widget_title'] ); ?>
                </<?php echo esc_attr( $iweb_widget_elmentor_settings['title_html_tag'] ); ?>>

                <div class="element-introduces__content">
                    <?php echo wp_kses_post( $iweb_widget_elmentor_settings['widget_description'] ); ?>
                </div>

                <?php if ( !empty( $iweb_widget_elmentor_text_link ) ) : ?>
                    <div class="element-introduces__text--link text-right">
                        <a href="<?php echo esc_url( $iweb_widget_elmentor_link_text_url ); ?>" title="<?php echo esc_attr( $iweb_widget_elmentor_text_link ); ?>" <?php echo esc_attr( $iweb_widget_elmentor_link_text_target ); ?>>
                            <?php echo esc_html( $iweb_widget_elmentor_text_link ); ?>
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php

    }

    protected function _content_template() {

    ?>

        <div class="element-introduces d-md-flex">
            <div class="element-introduces__icon">
                <# if ( settings.select_type_icon == 'image' ) {#>
                    <img src="{{ settings.image_icon.url }}">
                <# }else { #>
                    <i class="element-introduces__font--icon {{ settings.icon }}" aria-hidden="true"></i>
                <# } #>
            </div>

            <div class="element-introduces__box">
                <{{{ settings.title_html_tag }}} class="element-introduces__title element-title">
                    {{{ settings.widget_title }}}
                </{{{ settings.title_html_tag }}}>

                <div class="element-introduces__content">
                    {{{ settings.widget_description }}}
                </div>

                <#
                if ( settings.text_link != '' ) {

                    var target = settings.link.is_external ? 'target="_blank"' : '';

                #>
                    <a class="element-introduces__text--link" href="{{ settings.link.url }}" title="{{{ settings.text_link }}}" {{ target }}>
                        {{{ settings.text_link }}}
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a>
                <# } #>
            </div>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new iweb_widget_introduces );