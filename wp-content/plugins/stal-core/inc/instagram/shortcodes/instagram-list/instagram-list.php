<?php

if ( ! function_exists( 'stal_core_add_instagram_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function stal_core_add_instagram_list_shortcode( $shortcodes ) {
		if( qode_framework_is_installed( 'instagram' ) ) {
			$shortcodes[] = 'StalCoreInstagramListShortcode';
		}
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_instagram_list_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreInstagramListShortcode extends StalCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_INC_URL_PATH . '/instagram/shortcodes/instagram-list' );
			$this->set_base( 'stal_core_instagram_list' );
			$this->set_name( esc_html__( 'Instagram List', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays instagram list', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'photos_number',
				'title'      => esc_html__( 'Number of Photos', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_number',
				'title'         => esc_html__( 'Number of Columns', 'stal-core' ),
				'options'       => array(
					'1'  => esc_html__( '1', 'stal-core' ),
					'2'  => esc_html__( '2', 'stal-core' ),
					'3'  => esc_html__( '3', 'stal-core' ),
					'4'  => esc_html__( '4', 'stal-core' ),
					'5'  => esc_html__( '5', 'stal-core' ),
					'6'  => esc_html__( '6', 'stal-core' ),
					'7'  => esc_html__( '7', 'stal-core' ),
					'8'  => esc_html__( '8', 'stal-core' ),
					'9'  => esc_html__( '9', 'stal-core' ),
					'10' => esc_html__( '10', 'stal-core' ),
				),
				'default_value' => '3'
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'space',
				'title'         => esc_html__( 'Padding Around Images', 'stal-core' ),
				'options'       => stal_core_get_select_type_options_pool( 'items_space' ),
				'default_value' => 'small'
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'image_resolution',
				'title'         => esc_html__( 'Image Resolution', 'stal-core' ),
				'options'       => array(
					'auto'  => esc_html__( 'Auto-detect (recommended)', 'stal-core' ),
					'thumb'  => esc_html__( 'Thumbnail (150x150)', 'stal-core' ),
					'medium'  => esc_html__( 'Medium (306x306)', 'stal-core' ),
					'full'  => esc_html__( 'Full (640x640)', 'stal-core' )
				),
				'default_value' => 'auto'
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['instagram_params']   = $this->get_instagram_params( $atts );
			
			return stal_core_get_template_part( 'instagram/shortcodes/instagram-list', 'templates/instagram-list', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-instagram-list';
			$holder_classes[] = ! empty( $atts['space'] ) ? 'qodef-gutter--' . $atts['space'] : '';
			$holder_classes[] = ! empty( $atts['columns_number'] ) ? 'qodef-col-num--' . $atts['columns_number'] : '';
			
			$holder_classes = array_merge( $holder_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_instagram_params( $atts ) {
			$params = array();
			
			$params['num'] = isset( $atts['photos_number'] ) && ! empty( $atts['photos_number'] ) ? $atts['photos_number'] : 6;
			$params['cols'] = isset( $atts['columns_number'] ) && ! empty( $atts['columns_number'] ) ? $atts['columns_number'] : 3;
			$params['imagepadding'] = isset( $atts['space'] ) && ! empty( $atts['space'] ) ? stal_core_get_space_value( $atts['space'] ) : 10;
			$params['imagepaddingunit'] = 'px';
			$params['showheader'] = false;
			$params['showfollow'] = false;
			$params['showbutton'] = false;
			$params['imageres'] = isset( $atts['image_resolution'] ) && ! empty( $atts['image_resolution'] ) ? $atts['image_resolution'] : 'auto';
			
			if ( is_array( $params ) && count( $params ) ) {
				foreach ( $params as $key => $value ) {
					if ( $value !== '' ) {
						$params[] = $key . "='" . esc_attr( str_replace( ' ', '', $value ) ) . "'";
					}
				}
			}
			
			return implode( ' ', $params );
		}
	}
}