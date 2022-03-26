<?php

if ( ! function_exists( 'stal_core_add_standard_mobile_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function stal_core_add_standard_mobile_header_global_option( $header_layout_options ) {
		$header_layout_options['standard'] = array(
			'image' => STAL_CORE_HEADER_LAYOUTS_URL_PATH . '/standard/assets/img/standard-header.png',
			'label' => esc_html__( 'Standard', 'stal-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'stal_core_filter_mobile_header_layout_option', 'stal_core_add_standard_mobile_header_global_option' );
}

if ( ! function_exists( 'stal_core_register_standard_mobile_header_layout' ) ) {
	function stal_core_register_standard_mobile_header_layout( $mobile_header_layouts ) {
		$mobile_header_layout = array(
			'standard' => 'StandardMobileHeader'
		);

		$mobile_header_layouts = array_merge( $mobile_header_layouts, $mobile_header_layout );

		return $mobile_header_layouts;
	}

	add_filter( 'stal_core_filter_register_mobile_header_layouts', 'stal_core_register_standard_mobile_header_layout');
}