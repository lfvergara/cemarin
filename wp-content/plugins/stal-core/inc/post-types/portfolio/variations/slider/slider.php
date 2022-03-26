<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_variation_slider' ) ) {
	function stal_core_add_portfolio_single_variation_slider( $variations ) {
		
		$variations['slider'] = esc_html__( 'Slider', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_options', 'stal_core_add_portfolio_single_variation_slider' );
}