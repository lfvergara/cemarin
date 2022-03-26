<?php
if ( ! function_exists( 'stal_core_add_centered_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */

	function stal_core_add_centered_header_global_option( $header_layout_options ) {
		$header_layout_options['centered'] = array(
			'image' => STAL_CORE_HEADER_LAYOUTS_URL_PATH . '/centered/assets/img/centered-header.png',
			'label' => esc_html__( 'Centered', 'stal-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'stal_core_filter_header_layout_option', 'stal_core_add_centered_header_global_option' );
}


if ( ! function_exists( 'stal_core_register_centered_header_layout' ) ) {
	function stal_core_register_centered_header_layout( $header_layouts ) {
		$header_layout = array(
			'centered' => 'CenteredHeader'
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'stal_core_filter_register_header_layouts', 'stal_core_register_centered_header_layout');
}