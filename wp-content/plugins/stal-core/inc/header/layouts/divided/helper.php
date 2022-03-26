<?php
if ( ! function_exists( 'stal_core_add_divided_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */

	function stal_core_add_divided_header_global_option( $header_layout_options ) {
		$header_layout_options['divided'] = array(
			'image' => STAL_CORE_HEADER_LAYOUTS_URL_PATH . '/divided/assets/img/divided-header.png',
			'label' => esc_html__( 'Divided', 'stal-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'stal_core_filter_header_layout_option', 'stal_core_add_divided_header_global_option' );
}


if ( ! function_exists( 'stal_core_register_divided_header_layout' ) ) {
	function stal_core_register_divided_header_layout( $header_layouts ) {
		$header_layout = array(
			'divided' => 'DividedHeader'
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'stal_core_filter_register_header_layouts', 'stal_core_register_divided_header_layout');
}

if ( ! function_exists( 'stal_core_register_divided_menu' ) ) {
	function stal_core_register_divided_menu($menus) {

		$menus['divided-menu-left-navigation']  = esc_html__( 'Divided Left Navigation', 'stal-core' );
		$menus['divided-menu-right-navigation'] = esc_html__( 'Divided Right Navigation', 'stal-core' );

		return $menus;
	}
	add_filter('stal_filter_register_navigation_menus','stal_core_register_divided_menu');
}