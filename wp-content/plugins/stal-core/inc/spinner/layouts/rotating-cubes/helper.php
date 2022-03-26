<?php

if ( ! function_exists( 'stal_core_add_rotating_cubes_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts  - module layouts
	 *
	 * @return array
	 */
	function stal_core_add_rotating_cubes_spinner_layout_option( $layouts ) {
		$layouts['rotating-cubes'] = esc_html__( 'Rotating Cubes', 'stal-core' );
		
		return $layouts;
	}
	
	add_filter( 'stal_core_filter_page_spinner_layout_options', 'stal_core_add_rotating_cubes_spinner_layout_option' );
}