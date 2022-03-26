<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_variation_custom' ) ) {
	function stal_core_add_portfolio_single_variation_custom( $variations ) {
		$variations['custom'] = esc_html__( 'Custom', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_options', 'stal_core_add_portfolio_single_variation_custom' );
}