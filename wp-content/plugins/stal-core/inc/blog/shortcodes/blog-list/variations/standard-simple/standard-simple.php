<?php

if ( ! function_exists( 'stal_core_add_blog_list_variation_standard_simple' ) ) {
	function stal_core_add_blog_list_variation_standard_simple( $variations ) {
		$variations['standard-simple'] = esc_html__( 'Standard Simple', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_blog_list_layouts', 'stal_core_add_blog_list_variation_standard_simple' );
}

if ( ! function_exists( 'stal_core_load_blog_list_variation_standard_simple_assets' ) ) {
	function stal_core_load_blog_list_variation_standard_simple_assets( $is_enabled, $params ) {
		
		if ( $params['layout'] === 'standard-simple' ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
	
	add_filter( 'stal_core_filter_load_blog_list_assets', 'stal_core_load_blog_list_variation_standard_simple_assets', 10, 2 );
}