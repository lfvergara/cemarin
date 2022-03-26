<?php

if ( ! function_exists( 'stal_core_add_icon_list_item_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function stal_core_add_icon_list_item_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreIconListItemShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_icon_list_item_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreIconListItemShortcode extends StalCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/icon-list-item' );
			$this->set_base( 'stal_core_icon_list_item' );
			$this->set_name( esc_html__( 'Icon List Item', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds icon list item element', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'item_margin_bottom',
				'title'      => esc_html__( 'Item Margin Bottom', 'stal-core' )
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
				'name'          => 'icon_type',
				'title'         => esc_html__( 'Icon Type', 'stal-core' ),
				'options'       => array(
					'icon-pack'   => esc_html__( 'Icon Pack', 'stal-core' ),
					'custom-icon' => esc_html__( 'Custom Icon', 'stal-core' ),
					'square'  => esc_html__( 'Square', 'stal-core' ),
					'predefined'  => esc_html__( 'Predefined (underline with Icon on right)', 'stal-core' ),
					'predefined-two'  => esc_html__( 'Predefined 2 (no icon, with menu like hover effect)', 'stal-core' ),
				),
				'default_value' => 'icon-pack'
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'custom_icon',
				'title'      => esc_html__( 'Custom Icon', 'stal-core' ),
				'dependency' => array(
					'show' => array(
						'icon_type' => array(
							'values'        => 'custom-icon',
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
               'field_type' => 'select',
               'name'       => 'icon_alignment',
               'title'      => esc_html__( 'Icon Alignment', 'stal-core' ),
               'options'       => array(
                   ''       => esc_html__( 'Default', 'stal-core' ),
                   'top'   => esc_html__( 'Top', 'stal-core' ),
                   'center' => esc_html__( 'Center', 'stal-core' ),
               ),
               'group'      => esc_html__( 'Icon', 'stal-core' ),
           ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'stal-core' ),
				'group'      => esc_html__( 'Title', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'stal-core' ),
				'options'       => stal_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
				'group'         => esc_html__( 'Title', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'stal-core' ),
				'group'      => esc_html__( 'Title', 'stal-core' )
			) );
			$this->set_option( array(
               'field_type' => 'text',
               'name'       => 'line_height',
               'title'      => esc_html__( 'Title Line Height', 'stal-core' ),
               'group'      => esc_html__( 'Title', 'stal-core' )
            ) );
			$this->set_option( array(
               'field_type' => 'text',
               'name'       => 'text_offset',
               'title'      => esc_html__( 'Title Top Offset', 'stal-core' ),
               'group'      => esc_html__( 'Title', 'stal-core' )
            ) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['offset_styles']   = $this->get_offset_styles( $atts );
			$atts['icon_params']    = $this->generate_icon_params( $atts );
			
			return stal_core_get_template_part( 'shortcodes/icon-list-item', 'templates/icon-list-item', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = array();
			
			$holder_classes[] = 'qodef-icon-list-item';
			$holder_classes[] = ! empty( $atts['icon_type'] ) ? 'qodef-icon--' . $atts['icon_type'] : '';
			$holder_classes[] = ! empty( $atts['icon_alignment'] ) ?  'qodef-alignment--' . $atts['icon_alignment'] : 'qodef-alignment--center';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( $atts['item_margin_bottom'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['item_margin_bottom'] ) ) {
					$styles[] = 'margin-bottom: ' . $atts['item_margin_bottom'];
				} else {
					$styles[] = 'margin-bottom: ' . intval( $atts['item_margin_bottom'] ) . 'px';
				}
			}
			
			return $styles;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			$line_height = $atts['line_height'];
			if ( ! empty( $line_height ) ) {
				if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
					$styles[] = 'line-height: ' . $line_height;
				} else {
					$styles[] = 'line-height: ' . intval( $line_height ) . 'px';
				}
			}
			
			return $styles;
		}
		
		private function get_offset_styles( $atts ) {
			$styles = array();
			
			$offset = $atts['text_offset'];
			if ( ! empty( $offset ) ) {
				if ( qode_framework_string_ends_with_typography_units( $offset ) ) {
					$styles[] = 'top: ' . $offset;
				} else {
					$styles[] = 'top: ' . intval( $offset ) . 'px';
				}
				$styles[] = 'position: relative';
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