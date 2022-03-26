<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_variation_gallery_small' ) ) {
	function stal_core_add_portfolio_single_variation_gallery_small( $variations ) {
		$variations['gallery-small'] = esc_html__( 'Gallery - Small', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_options', 'stal_core_add_portfolio_single_variation_gallery_small' );
}