<?php

if ( ! function_exists( 'stal_core_register_standard_title_layout' ) ) {
	function stal_core_register_standard_title_layout( $layouts ) {
		$layouts['standard'] = 'StalCoreStandardTitle';
		
		return $layouts;
	}
	
	add_filter( 'stal_core_filter_register_title_layouts', 'stal_core_register_standard_title_layout');
}

if ( ! function_exists( 'stal_core_add_standard_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function stal_core_add_standard_title_layout_option( $layouts ) {
		$layouts['standard'] = esc_html__( 'Standard', 'stal-core' );
		
		return $layouts;
	}
	
	add_filter( 'stal_core_filter_title_layout_options', 'stal_core_add_standard_title_layout_option' );
}

if ( ! function_exists( 'stal_core_get_standard_title_layout_subtitle_text' ) ) {
	/**
	 * Function that render current page subtitle text
	 */
	function stal_core_get_standard_title_layout_subtitle_text() {
		$subtitle_meta = stal_core_get_post_value_through_levels( 'qodef_page_title_subtitle' );
		$subtitle      = array( 'subtitle' => ! empty( $subtitle_meta ) ? $subtitle_meta : '' );
		
		return apply_filters( 'stal_core_filter_standard_title_layout_subtitle_text', $subtitle );
	}
}
