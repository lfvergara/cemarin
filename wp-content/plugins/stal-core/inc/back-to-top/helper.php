<?php

if ( ! function_exists( 'stal_core_is_back_to_top_enabled' ) ) {
	function stal_core_is_back_to_top_enabled() {
		return stal_core_get_post_value_through_levels( 'qodef_back_to_top' ) !== 'no';
	}
}

if ( ! function_exists( 'stal_core_add_back_to_top_to_body_classes' ) ) {
	function stal_core_add_back_to_top_to_body_classes( $classes ) {
		$classes[] = stal_core_is_back_to_top_enabled() ? 'qodef-back-to-top--enabled' : '';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stal_core_add_back_to_top_to_body_classes' );
}

if ( ! function_exists( 'stal_core_load_back_to_top' ) ) {
	/**
	 * Loads Back To Top HTML
	 */
	function stal_core_load_back_to_top() {
		
		if ( stal_core_is_back_to_top_enabled() ) {
			$parameters = array();
			
			stal_core_template_part( 'back-to-top', 'templates/back-to-top', '', $parameters );
		}
	}
	
	add_action( 'stal_action_before_wrapper_close_tag', 'stal_core_load_back_to_top' );
}