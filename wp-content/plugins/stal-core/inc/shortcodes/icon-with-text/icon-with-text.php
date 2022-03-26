<?php

if ( ! function_exists( 'stal_core_add_icon_with_text_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function stal_core_add_icon_with_text_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreIconWithTextShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_icon_with_text_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreIconWithTextShortcode extends StalCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'stal_core_filter_icon_with_text_layouts', array() ) );
			
			$options_map = stal_core_get_variations_options_map( $this->get_layouts() );
			$default_value = $options_map['default_value'];
			
			$this->set_extra_options( apply_filters( 'stal_core_filter_icon_with_text_extra_options', array(), $default_value ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/icon-with-text' );
			$this->set_base( 'stal_core_icon_with_text' );
			$this->set_name( esc_html__( 'Icon With Text', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds icon with text element', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'stal-core' ),
			) );
			
			$options_map = stal_core_get_variations_options_map( $this->get_layouts() );
			
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
				                   'name'          => 'boxed',
				                   'title'         => esc_html__( 'Box Around?', 'stal-core' ),
				                   'options'       => stal_core_get_select_type_options_pool( 'no_yes' ),
				                   'default_value' => 'no'
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'color',
				                   'name'       => 'box_color',
				                   'title'      => esc_html__( 'Box Background Color', 'stal-core' ),
				                   'dependency' => array(
					                   'show' => array(
						                   'boxed' => array(
							                   'values'        => 'yes',
							                   'default_value' => 'no'
						                   )
					                   )
				                   )
			                   ) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'link',
				'title'         => esc_html__( 'Link', 'stal-core' ),
				'default_value' => ''
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Link Target', 'stal-core' ),
				'options'       => stal_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
            $this->set_option( array(
                'field_type'    => 'select',
                'name'          => 'appear_animation',
                'title'         => esc_html__( 'Appear Animation', 'stal-core' ),
                'options'       => stal_core_get_select_type_options_pool( 'no_yes' ),
                'default_value' => 'no'
            ) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'icon_type',
				'title'         => esc_html__( 'Icon Type', 'stal-core' ),
				'options'       => array(
					'icon-pack'   => esc_html__( 'Icon Pack', 'stal-core' ),
					'custom-icon' => esc_html__( 'Custom Icon', 'stal-core' ),
                    'svg-image'   => esc_html__( 'SVG Image', 'stal-core' )
 				),
				'default_value' => 'icon-pack',
				'group'         => esc_html__( 'Icon', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'custom_icon',
				'title'      => esc_html__( 'Custom Icon', 'stal-core' ),
				'group'      => esc_html__( 'Icon', 'stal-core' ),
				'dependency' => array(
					'show' => array(
						'icon_type' => array(
							'values'        => 'custom-icon',
							'default_value' => 'icon-pack'
						)
					)
				)
			) );
            $this->set_option( array(
                'field_type' => 'textarea',
                'name'       => 'svg_image_path',
                'title'      => esc_html__( 'SVG Image Path', 'stal-core' ),
                'group'      => esc_html__( 'Icon', 'stal-core' ),
                'dependency' => array(
                    'show' => array(
                        'icon_type' => array(
                            'values'        => 'svg-image',
                            'default_value' => 'icon-pack'
                        )
                    )
                )
            ) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'stal_core_icon',
				'exclude'           => array( 'custom_class', 'link', 'target', 'margin' ),
				'additional_params' => array(
					'group'      => esc_html__( 'Icon', 'stal-core' ),
					'dependency' => array(
						'show' => array(
							'icon_type' => array(
								'values'        => 'icon-pack',
								'default_value' => 'icon-pack'
							)
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'stal-core' ),
				'group'      => esc_html__( 'Content', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'stal-core' ),
				'options'       => stal_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h4',
				'group'         => esc_html__( 'Content', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'stal-core' ),
				'group'      => esc_html__( 'Content', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_top',
				'title'      => esc_html__( 'Title Margin Top', 'stal-core' ),
				'group'      => esc_html__( 'Content', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'stal-core' ),
				'group'      => esc_html__( 'Content', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'stal-core' ),
				'group'      => esc_html__( 'Content', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'stal-core' ),
				'group'      => esc_html__( 'Content', 'stal-core' )
			) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['box_styles']     = $this->get_box_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['icon_params']    = $this->generate_icon_params( $atts );
			
			return stal_core_get_template_part( 'shortcodes/icon-with-text', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-icon-with-text';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ( $atts['boxed'] === 'yes' ) ? 'qodef--box-around' : '';
			$holder_classes[] = ! empty( $atts['icon_type'] ) ? 'qodef--' . $atts['icon_type'] : '';
			$holder_classes[] = isset( $atts['appear_animation'] ) && $atts['appear_animation'] === 'yes' ? 'qodef-appear-animation--enabled' : '';
			
			$holder_classes = apply_filters( 'stal_core_filter_icon_with_text_variation_classes', $holder_classes, $atts );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_box_styles( $atts ) {
			$styles = array();
			
			if ( $atts['boxed'] === 'yes' ) {
				if ( ! empty( $atts['box_color'] ) ) {
					$styles[] = 'background-color: ' . $atts['box_color'];
				}
			}
			
			return $styles;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( $atts['title_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( $atts['text_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function generate_icon_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'stal_core_icon',
				'exclude'        => array( 'custom_class', 'link', 'target', 'margin' ),
				'atts'           => $atts,
			) );
			
			return $params;
		}
	}
}