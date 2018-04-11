<?php

namespace Elementor;

class iweb_plugin_elementor_widgets {

    /**
     * Plugin constructor.
     */
    public function __construct() {
        $this->iweb_elementor_add_actions();
    }

    private function iweb_elementor_add_actions() {
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'iweb_elementor_widgets_registered' ] );
        add_action( 'elementor/init', [ $this, 'iweb_elementor_widgets_int' ] );
    }

    public function iweb_elementor_widgets_registered() {
        $this->iweb_elementor_includes();
    }

    public function iweb_elementor_widgets_int() {
        $this->iweb_elementor_register_widget();
    }

    private function iweb_elementor_includes() {
        foreach(glob( get_parent_theme_file_path( '/extension/elementor/widgets/*.php' ) ) as $file){
            require $file;
        }
    }

    private function iweb_elementor_register_widget() {

        Plugin::instance()->elements_manager->add_category(
            'iweb-widgets',
            [
                'title' => esc_html__( 'iweb Widgets', 'iweb' ),
                'icon'  => 'icon-goes-here'
            ]
        );

    }

}

new iweb_plugin_elementor_widgets();