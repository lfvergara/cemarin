<?php

class StalCoreElementorParallaxHandler {
    private static $instance;
    public $parallax_sections = array();

    public function __construct() {
        add_action( 'elementor/element/section/_section_responsive/after_section_end', array( $this, 'render_parallax_options' ), 10, 2 );
        add_action( 'elementor/element/section/_section_responsive/after_section_end', array( $this, 'render_grid_options' ), 10, 2 );
        add_action( 'elementor/frontend/section/before_render', array( $this, 'section_before_render' ));
        add_action( 'elementor/frontend/element/before_render', array( $this, 'section_before_render' ));
        add_action( 'elementor/frontend/before_enqueue_styles', array( $this, 'enqueue_styles' ), 9 );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ), 9 );
    }

    public static function get_instance() {
        if ( self::$instance === null ) {
            return new self();
        }

        return self::$instance;
    }

    public function render_parallax_options( $section, $args){
        $section->start_controls_section(
            'qodef_parallax',
            [
                'label' => esc_html__( 'Stal Core Parallax', 'stal-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

        $section->add_control(
            'qodef_enable_parallax',
            [
                'label'        => esc_html__( 'Enable Parallax', 'stal-core'),
                'type'         => Elementor\Controls_Manager::SELECT,
                'default'      => 'no',
                'options' => [
                    'no' => esc_html__('No', 'stal-core')  ,
                    'yes' => esc_html__('Yes', 'stal-core')  ,
                ],
                'render_type'  => 'template',
            ]
        );

        $section->add_control(
            'qodef_parallax_image',
            [
                'label'        => esc_html__( 'Parallax Background Image', 'stal-core' ),
                'type'         => Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'qodef_enable_parallax' => 'yes'
                ],
                'render_type'  => 'template',
            ]
        );

        $section->add_control(
            'qodef_parallax_height',
            [
                'label'        => esc_html__( 'Parallax Section Height', 'stal-core' ),
                'type'         => Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'qodef_enable_parallax' => 'yes'
                ],
                'render_type'  => 'template',
            ]
        );

        $section->end_controls_section();
    }

    public function render_grid_options( $section, $args ){
        $section->start_controls_section(
            'qodef_grid_row',
            [
                'label' => esc_html__( 'Stal Grid', 'stal-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

        $section->add_control(
            'qodef_enable_grid_row',
            [
                'label'        => esc_html__( 'Make this row "In Grid"', 'stal-core'),
                'type'         => Elementor\Controls_Manager::SELECT,
                'default'      => 'no',
                'options' => [
                    'no' => esc_html__('No', 'stal-core')  ,
                    'grid' => esc_html__('Yes', 'stal-core')  ,
                ],
                'prefix_class' => 'qodef-elementor-content-'
            ]
        );

        $section->end_controls_section();
    }

    public function section_before_render( $widget ){

        $data     = $widget->get_data();
        $type     = isset( $data['elType'] ) ? $data['elType'] : 'section';
        $settings = $data['settings'];

        if ( 'section' === $type ) {
            if ( isset( $settings['qodef_enable_parallax'] ) && $settings['qodef_enable_parallax'] == 'yes' ) {
                $parallax_image = $widget->get_settings_for_display( 'qodef_parallax_image' );
                $parallax_height = $widget->get_settings_for_display( 'qodef_parallax_height' );

                if ( ! in_array( $data['id'], $this->parallax_sections ) ) {
                    $this->parallax_sections[ $data['id'] ] = [$parallax_image, $parallax_height];
                }

                $widget->add_render_attribute( '_wrapper', 'style', 'height: ' . $parallax_height );

            }
        }
    }

    public function enqueue_styles(){
        wp_enqueue_style('stal-core-elementor', STAL_CORE_INC_URL_PATH . '/elementor/assets/css/elementor.min.css');
    }

    public function enqueue_scripts(){
        wp_enqueue_script('stal-core-elementor', STAL_CORE_INC_URL_PATH . '/elementor/assets/js/elementor.js', array( 'jquery', 'elementor-frontend' ));

        $elementor_global_vars = array(
            'elementorParallaxSection' => $this->parallax_sections
        );

        wp_localize_script( 'stal-core-elementor', 'qodefElementorGlobal', array(
            'vars' => $elementor_global_vars
        ));
    }

}

if ( ! function_exists( 'stal_core_init_parallax_handler' ) ) {
    function stal_core_init_parallax_handler() {
        StalCoreElementorParallaxHandler::get_instance();
    }

    add_action( 'init', 'stal_core_init_parallax_handler', 1 );
}