<?php

if ( ! function_exists( 'stal_core_add_progress_bar_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts  - module layouts
	 *
	 * @return array
	 */
	function stal_core_add_progress_bar_spinner_layout_option( $layouts ) {
		$layouts['progress-bar'] = esc_html__( 'Progress Bar', 'stal-core' );
		
		return $layouts;
	}
	
	add_filter( 'stal_core_filter_page_spinner_layout_options', 'stal_core_add_progress_bar_spinner_layout_option' );
}

if ( ! function_exists( 'stal_core_add_progress_bar_spinner_layout_classes' ) ) {
	/**
	 * Function that return classes for page spinner area
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function stal_core_add_progress_bar_spinner_layout_classes( $classes ) {
		$type = stal_core_get_post_value_through_levels( 'qodef_page_spinner_type' );
		
		if ( $type === 'progress-bar' ) {
			$classes[] = 'qodef--custom-spinner';
		}
		
		return $classes;
	}
	
	add_filter( 'stal_core_filter_page_spinner_classes', 'stal_core_add_progress_bar_spinner_layout_classes' );
}