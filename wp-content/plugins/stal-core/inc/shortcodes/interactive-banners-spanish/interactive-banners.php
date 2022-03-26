<?php

if ( ! function_exists( 'stal_core_add_interactive_banners_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function stal_core_add_interactive_banners_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreInteractiveBannersShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_interactive_banners_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreInteractiveBannersShortcode extends StalCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/interactive-banners-spanish' );
			$this->set_base( 'stal_core_interactive_banners' );
			$this->set_name( esc_html__( 'Interactive Columns Spanish', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays interactive banners with provided parameters', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				                   'field_type'    => 'select',
				                   'name'          => 'number_of_items',
				                   'title'         => esc_html__( 'Number Of Items', 'stal-core' ),
				                   'options'       => array(
					                   'four' => esc_html__( 'Four', 'stal-core' ),
					                   'five'    => esc_html__( 'Five', 'stal-core' )
				                   ),
				                   'default_value' => 'five'
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'repeater',
				                   'name'       => 'children',
				                   'title'      => esc_html__( 'Items', 'stal-core' ),
				                   'items'      => array(
					                   array(
						                   'field_type' => 'image',
						                   'name'       => 'small_image',
						                   'title'      => esc_html__( 'Title Image', 'stal-core' )
					                   ),
					                   array(
						                   'field_type'    => 'text',
						                   'name'          => 'title',
						                   'title'         => esc_html__( 'Title', 'stal-core' ),
						                   'default_value' => ''
					                   ),
					                   array(
						                   'field_type'    => 'text',
						                   'name'          => 'subtitle',
						                   'title'         => esc_html__( 'Subtitle', 'stal-core' ),
						                   'default_value' => ''
					                   ),
					                   array(
						                   'field_type'    => 'text',
						                   'name'          => 'link',
						                   'title'         => esc_html__( 'Link', 'stal-core' ),
						                   'default_value' => ''
					                   ),
					                   array(
						                   'field_type'    => 'text',
						                   'name'          => 'link_text',
						                   'title'         => esc_html__( 'Link Text', 'stal-core' ),
						                   'default_value' => ''
					                   ),
					                   array(
	                                       'field_type'    => 'select',
	                                       'name'          => 'link_target',
	                                       'title'         => esc_html__( 'Link Target', 'stal-core' ),
	                                       'options'       => stal_core_get_select_type_options_pool( 'link_target' ),
	                                       'default_value' => '_self'
                                       ),
					                   array(
						                   'field_type'    => 'text',
						                   'name'          => 'tag',
						                   'title'         => esc_html__( 'Tag', 'stal-core' ),
						                   'default_value' => ''
					                   ),
					                   array(
						                   'field_type' => 'image',
						                   'name'       => 'item_image',
						                   'title'      => esc_html__( 'Background Image', 'stal-core' )
					                   ),
				                   )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['number_of_items_numeric'] = $atts['number_of_items'] == 'four' ? 4 : 5;
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['this_shortcode'] = $this;
			
			return stal_core_get_template_part( 'shortcodes/interactive-banners-spanish', 'templates/interactive-banners-spanish', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = ! empty( $atts['number_of_items'] ) ? ' qodef-interactive-banners-' . $atts['number_of_items'] : ' qodef-interactive-banners-five';
			
			return implode( ' ', $holder_classes );
		}
	}
}