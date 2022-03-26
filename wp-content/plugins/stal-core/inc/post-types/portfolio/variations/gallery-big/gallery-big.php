<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_variation_gallery_big' ) ) {
	function stal_core_add_portfolio_single_variation_gallery_big( $variations ) {
		$variations['gallery-big'] = esc_html__( 'Gallery - Big', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_options', 'stal_core_add_portfolio_single_variation_gallery_big' );
}