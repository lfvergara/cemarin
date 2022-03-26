<?php

if ( ! function_exists( 'stal_core_add_custom_font_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function stal_core_add_custom_font_widget( $widgets ) {
		$widgets[] = 'StalCoreCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'stal_core_filter_register_widgets', 'stal_core_add_custom_font_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class StalCoreCustomFontWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'stal_core_custom_font'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'stal_core_custom_font' );
				$this->set_name( esc_html__( 'Stal Custom Font', 'stal-core' ) );
				$this->set_description( esc_html__( 'Add a custom font element into widget areas', 'stal-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[stal_core_custom_font $params]" ); // XSS OK
		}
	}
}