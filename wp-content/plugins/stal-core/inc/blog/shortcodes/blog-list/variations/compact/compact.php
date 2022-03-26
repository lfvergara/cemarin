<?php

if ( ! function_exists( 'stal_core_add_blog_list_variation_compact' ) ) {
	function stal_core_add_blog_list_variation_compact( $variations ) {
		$variations['compact'] = esc_html__( 'Compact', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_blog_list_layouts', 'stal_core_add_blog_list_variation_compact' );
}

if ( ! function_exists( 'stal_core_load_blog_list_variation_compact_assets' ) ) {
	function stal_core_load_blog_list_variation_compact_assets( $is_enabled, $params ) {
		
		if ( $params['layout'] === 'compact' ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
	
	add_filter( 'stal_core_filter_load_blog_list_assets', 'stal_core_load_blog_list_variation_compact_assets', 10, 2 );
}