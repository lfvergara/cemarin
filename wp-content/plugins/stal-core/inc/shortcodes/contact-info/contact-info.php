<?php

if( ! function_exists('stal_core_add_contact_info_shortcode')) {
	function stal_core_add_contact_info_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreContactInfoShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_contact_info_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreContactInfoShortcode extends StalCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/contact-info' );
			$this->set_base( 'stal_core_contact_info' );
			$this->set_name( esc_html__( 'Contact Info', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds contact info element', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				                   'field_type' => 'text',
				                   'name'       => 'custom_class',
				                   'title'      => esc_html__( 'Custom Class', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'image',
				                   'name'       => 'image',
				                   'title'      => esc_html__( 'Image', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'text',
				                   'name'       => 'title',
				                   'title'      => esc_html__( 'Title', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'textarea',
				                   'name'       => 'address',
				                   'title'      => esc_html__( 'Address', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'textarea',
				                   'name'       => 'phone',
				                   'title'      => esc_html__( 'Phone', 'stal-core' ),
			                   ) );
			$this->set_option( array(
				                   'field_type' => 'textarea',
				                   'name'       => 'email',
				                   'title'      => esc_html__( 'Email', 'stal-core' ),
			                   ) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			
			return stal_core_get_template_part( 'shortcodes/contact-info', 'templates/contact-info', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-contact-info';
			
			return implode( ' ', $holder_classes );
		}
	}
}