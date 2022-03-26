<?php

if ( ! function_exists( 'stal_core_add_working_hours_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function stal_core_add_working_hours_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreWorkingHoursListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_working_hours_list_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreWorkingHoursListShortcode extends StalCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_INC_URL_PATH . '/working-hours/shortcodes/working-hours-list' );
			$this->set_base( 'stal_core_working_hours_list' );
			$this->set_name( esc_html__( 'Working Hours List', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays working hours list', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'stal-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['holder_classes']               = $this->get_holder_classes();
			$atts['working_hours_params']         = $this->get_working_hours_params();
			$atts['working_hours_special_params'] = $this->get_working_hours_special_params();
			
			return stal_core_get_template_part( 'working-hours/shortcodes/working-hours-list', 'templates/working-hours-list', '', $atts );
		}
		
		private function get_holder_classes() {
			$holder_classes   = $this->init_holder_classes();
			$holder_classes[] = 'qodef-working-hours-list';
			$holder_classes   = array_merge( $holder_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_working_hours_params() {
			$params = array();
			
			return apply_filters( 'stal_filter_working_hours_template_params', $params );
		}
		
		private function get_working_hours_special_params() {
			$params = array();
			
			return apply_filters( 'stal_filter_working_hours_special_template_params', $params );
		}
	}
}