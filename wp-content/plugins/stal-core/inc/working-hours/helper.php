<?php

if ( ! function_exists( 'stal_core_include_working_hours_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function stal_core_include_working_hours_shortcodes() {
		foreach ( glob( STAL_CORE_INC_PATH . '/working-hours/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'stal_core_include_working_hours_shortcodes' );
}

if ( ! function_exists( 'stal_core_include_working_hours_widgets' ) ) {
	/**
	 * Function that includes widgets
	 */
	function stal_core_include_working_hours_widgets() {
		foreach ( glob( STAL_CORE_INC_PATH . '/working-hours/shortcodes/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}
	
	add_action( 'qode_framework_action_before_widgets_register', 'stal_core_include_working_hours_widgets' );
}

if ( ! function_exists( 'stal_core_set_working_hours_template_params' ) ) {
	/**
	 * Function that set working hours area content parameters
	 *
	 * @param $params array
	 *
	 * @return array
	 */
	function stal_core_set_working_hours_template_params( $params ) {
		$days = array(
			'monday',
			'tuesday',
			'wednesday',
			'thursday',
			'friday',
			'saturday',
			'sunday'
		);
		
		foreach ( $days as $day ) {
			$option = stal_core_get_post_value_through_levels( 'qodef_working_hours_' . $day );
			
			$params[ $day ] = ! empty( $option ) ? esc_attr( $option ) : '';
		}
		
		return $params;
	}
	
	add_filter( 'stal_filter_working_hours_template_params', 'stal_core_set_working_hours_template_params' );
}

if ( ! function_exists( 'stal_core_set_working_hours_special_template_params' ) ) {
	/**
	 * Function that set working hours area special content parameters
	 *
	 * @param $params array
	 *
	 * @return array
	 */
	function stal_core_set_working_hours_special_template_params( $params ) {
		$special_days = stal_core_get_post_value_through_levels( 'qodef_working_hours_special_days' );
		$special_text = stal_core_get_post_value_through_levels( 'qodef_working_hours_special_text' );
		
		if ( ! empty( $special_days ) ) {
			$special_days = array_filter( (array) $special_days, 'strlen' );
		}
		
		$params['special_days'] = $special_days;
		$params['special_text'] = esc_attr( $special_text );
		
		return $params;
	}
	
	add_filter( 'stal_filter_working_hours_special_template_params', 'stal_core_set_working_hours_special_template_params' );
}

if ( ! function_exists( 'stal_core_working_hours_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param $position int
	 * @param $map string
	 *
	 * @return int
	 */
	function stal_core_working_hours_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'working-hours' ) {
			$position = 90;
		}
		
		return $position;
	}
	
	add_filter( 'stal_core_filter_admin_options_map_position', 'stal_core_working_hours_set_admin_options_map_position', 10, 2 );
}