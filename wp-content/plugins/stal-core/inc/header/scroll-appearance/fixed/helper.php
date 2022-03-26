<?php
if ( ! function_exists( 'stal_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function stal_core_add_fixed_header_option( $header_scroll_appearance_options ) {
		$header_scroll_appearance_options['fixed'] = esc_html__( 'Fixed', 'stal-core' );

		return $header_scroll_appearance_options;
	}

	add_filter( 'stal_core_filter_header_scroll_appearance_option', 'stal_core_add_fixed_header_option' );
}

if ( ! function_exists( 'stal_core_fixed_header_remove_template_call' ) ) {

	function stal_core_fixed_header_remove_template_call( $template ) {
		$template = str_replace("fixed","",$template);
		return $template;
	}

	//add_filter( 'stal_core_filter_header_scroll_appearance_template', 'stal_core_fixed_header_remove_template_call' );
}