<?php

if ( ! function_exists( 'stal_core_filter_portfolio_list_info_below_tilt' ) ) {
	function stal_core_filter_portfolio_list_info_below_tilt( $variations ) {
		$variations['tilt'] = esc_html__( 'Tilt', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_list_info_below_animation_options', 'stal_core_filter_portfolio_list_info_below_tilt' );
}

if ( ! function_exists( 'stal_core_include_tilt_scripts' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts
	 *
	 * @param $atts
	 */
	function stal_core_include_tilt_scripts( $atts ) {
		
		if ( $atts['layout'] == 'info-below' && $atts['hover_animation_info-below'] == 'tilt' ) {
			wp_enqueue_script( 'tilt');
		}
	}
	
	add_action( 'stal_core_action_portfolio_list_load_assets', 'stal_core_include_tilt_scripts' );
}

if ( ! function_exists( 'stal_core_register_tilt_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param $scripts
	 * @return $atts
	 */
	function stal_core_register_tilt_scripts( $scripts ) {
		
		$scripts['tilt'] = array(
			'registered'	=> false,
			'url'			=> STAL_CORE_INC_URL_PATH . '/post-types/portfolio/shortcodes/portfolio-list/variations/info-below/hover-animations/tilt/assets/js/plugins/tilt.jquery.min.js',
			'dependency'	=> array( 'jquery' )
		);
		
		return $scripts;
	}
	
	add_filter( 'stal_core_filter_portfolio_list_register_assets', 'stal_core_register_tilt_scripts' );
}