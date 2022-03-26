<?php

if ( ! function_exists( 'stal_core_add_portfolio_single_variation_images_big' ) ) {
	function stal_core_add_portfolio_single_variation_images_big( $variations ) {
		$variations['images-big'] = esc_html__( 'Images - Big', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_options', 'stal_core_add_portfolio_single_variation_images_big' );
}

if ( ! function_exists( 'stal_core_set_default_portfolio_single_variation_compact' ) ) {
	function stal_core_set_default_portfolio_single_variation_compact() {
		return 'images-big';
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout_default_value', 'stal_core_set_default_portfolio_single_variation_compact' );
}