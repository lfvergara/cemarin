<?php

if ( ! function_exists( 'stal_core_add_holder_with_image_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function stal_core_add_holder_with_image_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreHolderWithImageShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_holder_with_image_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreHolderWithImageShortcode extends StalCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'stal_core_filter_holder_with_image_layouts', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/holder-with-image' );
			$this->set_base( 'stal_core_holder_with_image' );
			$this->set_name( esc_html__( 'Holder with Image', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays Holder with Image with provided parameters', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_is_parent_shortcode( true );
			$this->set_child_elements( array() );
			$options_map = stal_core_get_variations_options_map( $this->get_layouts() );

			if ( qode_framework_is_installed( 'elementor' ) ) {
				$elementor_sections = stal_core_generate_elementor_templates_control( $this );

				if(!empty($elementor_sections)) {
					$this->set_option( $elementor_sections );
				}
			}
			
			$this->set_option( array(
				                   'field_type'    => 'select',
				                   'name'          => 'layout',
				                   'title'         => esc_html__( 'Layout', 'stal-core' ),
				                   'options'		=> $this->get_layouts(),
				                   'default_value' => $options_map['default_value'],
				                   'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			                   ) );
			$this->set_option( array(
				                   'field_type'    => 'select',
				                   'name'          => 'disable_breakpoint',
				                   'title'         => esc_html__( 'Responsive layout:', 'stal-core' ),
				                   'options'       => array(
					                   '1024' => esc_html__( 'Below 1024px', 'stal-core' ),
					                   '768'  => esc_html__( 'Below 768px', 'stal-core' ),
				                   ),
				                   'default_value' => '1024'
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'image',
				                   'name'       => 'image',
				                   'title'      => esc_html__( 'Image', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'text',
				                   'name'       => 'image_width',
				                   'title'      => esc_html__( 'Image Width (%)', 'stal-core' ),
				                   'description' => esc_html__( 'Enter only number. If not set, auto width is used, based on holder height', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'text',
				                   'name'       => 'padding',
				                   'title'      => esc_html__( 'Holder Padding', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'text',
				                   'name'       => 'content_width',
				                   'title'      => esc_html__( 'Content Width (%)', 'stal-core' ),
				                   'description' => esc_html__( 'Enter only number. Default is 62', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'text',
				                   'name'       => 'content_padding',
				                   'title'      => esc_html__( 'Content Padding', 'stal-core' ),
			                   ) );
            $this->set_option( array(
                                    'field_type'    => 'select',
                                    'name'          => 'appear_animation',
                                    'title'         => esc_html__( 'Appear Animation', 'stal-core' ),
                                    'options'       => array(
                                        'disabled'   => esc_html__( 'Disabled', 'stal-core' ),
                                        'from-left'  => esc_html__( 'From Left', 'stal-core' ),
                                        'from-right' => esc_html__( 'From Right', 'stal-core' ),
                                    ),
                                    'default_value' => 'disabled'
            ) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($atts['predefined_section']);
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles'] = $this->get_holder_styles( $atts );
			$atts['content_styles'] = $this->get_content_styles( $atts );
			$atts['image_styles'] = $this->get_image_styles( $atts );
			$atts['this_shortcode'] = $this;
			
			return stal_core_get_template_part( 'shortcodes/holder-with-image', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			$holder_classes[] = 'qodef-holder-with-image';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty ( $atts['disable_breakpoint'] ) ? 'qodef-disable-below--' . $atts['disable_breakpoint'] : '';
			$holder_classes[] = isset( $atts['appear_animation'] ) && $atts['appear_animation'] !== 'disabled' ? 'qodef-appear-animation-enabled--' . $atts['appear_animation'] : 'qodef-appear-animation-enabled--no';
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( $atts['padding'] !== '' ) {
				$styles[] = 'padding: ' . $atts['padding'];
			}
			
			return implode( ';', $styles );
		}
		
		private function get_content_styles( $atts ) {
			$styles = array();
			
			if ( $atts['content_padding'] !== '' ) {
				$styles[] = 'padding: ' . $atts['content_padding'];
			}
			
			if ( $atts['content_width'] !== '' ) {
				$styles[] = 'width: ' . $atts['content_width'].'%';
				
				$padding = 100 - $atts['content_width'];
				
				if($atts['layout'] === 'image-left') {
					$styles[] = 'margin-left: ' .$padding.'%';
				} else {
					$styles[] = 'margin-right: ' .$padding.'%';
				}
			}
			
			return implode( ';', $styles );
		}
		
		private function get_image_styles( $atts ) {
			$styles = array();
			
//			if ( ! empty( $atts['image'] ) ) {
//				$styles[] = 'background-image: url(' . esc_url( wp_get_attachment_url( $atts['image'] ) ) . ')';
//				$styles[] = 'background-size: cover';
//				$styles[] = 'background-position: center center';
//			}
			
			if ( $atts['image_width'] !== '' ) {
				$styles[] = 'width: ' . $atts['image_width'].'%';
			}
			
			return implode( ';', $styles );
		}
	}
}