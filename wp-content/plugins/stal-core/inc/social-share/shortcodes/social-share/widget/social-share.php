<?php

if ( ! function_exists( 'stal_core_add_social_share_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function stal_core_add_social_share_widget( $widgets ) {
		$widgets[] = 'StalCoreSocialShareWidget';
		
		return $widgets;
	}
	
	add_filter( 'stal_core_filter_register_widgets', 'stal_core_add_social_share_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class StalCoreSocialShareWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'stal_core_social_share'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'stal_core_social_share' );
				$this->set_name( esc_html__( 'Stal Social Share', 'stal-core' ) );
				$this->set_description( esc_html__( 'Add a social share element into widget areas', 'stal-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[stal_core_social_share $params]" ); // XSS OK
		}
	}
}