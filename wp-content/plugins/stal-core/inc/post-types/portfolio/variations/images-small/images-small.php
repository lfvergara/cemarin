<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_variation_images_small' ) ) {
	function stal_core_add_portfolio_single_variation_images_small( $variations ) {
		
		$variations['images-small'] = esc_html__( 'Images - Small', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_options', 'stal_core_add_portfolio_single_variation_images_small' );
}