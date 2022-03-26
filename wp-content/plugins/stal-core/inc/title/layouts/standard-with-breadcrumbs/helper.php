<?php

if ( ! function_exists( 'stal_core_register_standard_with_breadcrumbs_title_layout' ) ) {
	function stal_core_register_standard_with_breadcrumbs_title_layout( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = 'StalCoreStandardWithBreadcrumbsTitle';

		return $layouts;
	}

	add_filter( 'stal_core_filter_register_title_layouts', 'stal_core_register_standard_with_breadcrumbs_title_layout' );
}

if ( ! function_exists( 'stal_core_add_standard_with_breadcrumbs_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function stal_core_add_standard_with_breadcrumbs_title_layout_option( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = esc_html__( 'Standard with breadcrumbs', 'stal-core' );

		return $layouts;
	}

	add_filter( 'stal_core_filter_title_layout_options', 'stal_core_add_standard_with_breadcrumbs_title_layout_option' );
}

