<?php

if ( ! function_exists( 'stal_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function stal_core_add_separator_widget( $widgets ) {
		$widgets[] = 'StalCoreSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'stal_core_filter_register_widgets', 'stal_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class StalCoreSeparatorWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'stal_core_separator'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'stal_core_separator' );
				$this->set_name( esc_html__( 'Stal Separator', 'stal-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'stal-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[stal_core_separator $params]" ); // XSS OK
		}
	}
}