<?php

if ( ! function_exists( 'stal_core_filter_portfolio_list_info_on_hover_fade_in' ) ) {
	function stal_core_filter_portfolio_list_info_on_hover_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_list_info_on_hover_animation_options', 'stal_core_filter_portfolio_list_info_on_hover_fade_in' );
}