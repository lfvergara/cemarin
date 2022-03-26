<?php

if ( ! function_exists( 'stal_core_add_instagram_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function stal_core_add_instagram_list_widget( $widgets ) {
		$widgets[] = 'StalCoreInstagramListWidget';
		
		return $widgets;
	}
	
	add_filter( 'stal_core_filter_register_widgets', 'stal_core_add_instagram_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class StalCoreInstagramListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'stal-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'stal_core_instagram_list'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'stal_core_instagram_list' );
				$this->set_name( esc_html__( 'Stal Instagram List', 'stal-core' ) );
				$this->set_description( esc_html__( 'Add a instagram list element into widget areas', 'stal-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[stal_core_instagram_list $params]" ); // XSS OK
		}
	}
}