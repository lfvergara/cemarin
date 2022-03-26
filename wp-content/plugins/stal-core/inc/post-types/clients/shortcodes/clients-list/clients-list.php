<?php

if ( ! function_exists( 'stal_core_add_clients_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function stal_core_add_clients_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreClientsListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_clients_list_shortcode' );
}

if ( class_exists( 'StalCoreListShortcode' ) ) {
	class StalCoreClientsListShortcode extends StalCoreListShortcode {
		
		public function __construct() {
			$this->set_post_type( 'clients' );
			$this->set_post_type_additional_taxonomies( array( 'clients-category' ) );
			$this->set_layouts( apply_filters( 'stal_core_filter_clients_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'stal_core_filter_clients_list_extra_options', array() ) );
			$this->set_hover_animation_options( apply_filters( 'stal_core_filter_clients_list_hover_animation_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_CPT_URL_PATH . '/clients/shortcodes/clients-list' );
			$this->set_base( 'stal_core_clients_list' );
			$this->set_name( esc_html__( 'Clients List', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of clients', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'background_color',
				'title'      => esc_html__( 'Background Color', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'hover_background_color',
				'title'      => esc_html__( 'Background Hover Color', 'stal-core' )
			) );
            $this->set_option( array(
                'field_type'    => 'select',
                'name'          => 'hover_animation',
                'title'         => esc_html__( 'Hover Animation', 'stal-core' ),
                'options'       => array(
                    ''       => 'Default',
                    'simple' => 'Simple'
                ),
                'default_value' => ''
            ) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'masonry', 'justified-gallery' ),
				'exclude_option'   => array( 'images_proportion' )
			) );
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array(
					'layouts'          => $this->get_layouts(),
					'hover_animations' => $this->get_hover_animation_options(),
					'exclude_option'   => array( 'title_tag', 'text_transform' )
				) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['post_type'] = $this->get_post_type();
			
			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['query_result']   = new \WP_Query( stal_core_get_query_params( $atts ) );
			$atts['init_image']     = $this->get_init_image_styles( $atts );;
			$atts['hover_image']    = $this->get_hover_image_styles( $atts );;

			return stal_core_get_template_part( 'post-types/clients/shortcodes/clients-list', 'templates/content', $atts['behavior'], $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-clients-list';

			if ( isset( $atts['hover_animation'] ) && $atts['hover_animation'] === 'simple' ) {
			    $holder_classes[] = 'qodef-simple-hover-animation';
            }
			
			$list_classes            = $this->get_list_classes( $atts );
			$hover_animation_classes = $this->get_hover_animation_classes( $atts );
			$holder_classes          = array_merge( $holder_classes, $list_classes, $hover_animation_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();
			
			$list_item_classes = $this->get_list_item_classes( $atts );
			
			$item_classes = array_merge( $item_classes, $list_item_classes );
			
			return implode( ' ', $item_classes );
		}

		private function get_init_image_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['background_color'];
			}

			return $styles;
		}

		private function get_hover_image_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['hover_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['hover_background_color'];
			}

			return $styles;
		}
	}
}