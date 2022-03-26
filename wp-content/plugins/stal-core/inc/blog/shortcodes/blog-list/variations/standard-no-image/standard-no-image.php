<?php

if ( ! function_exists( 'stal_core_add_blog_list_variation_standard_no_image' ) ) {
	function stal_core_add_blog_list_variation_standard_no_image( $variations ) {
		$variations['standard-no-image'] = esc_html__( 'Standard No Image', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_blog_list_layouts', 'stal_core_add_blog_list_variation_standard_no_image' );
}

if ( ! function_exists( 'stal_core_load_blog_list_variation_standard_no_image_assets' ) ) {
	function stal_core_load_blog_list_variation_standard_no_image_assets( $is_enabled, $params ) {
		
		if ( $params['layout'] === 'standard-no-image' ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
	
	add_filter( 'stal_core_filter_load_blog_list_assets', 'stal_core_load_blog_list_variation_standard_no_image_assets', 10, 2 );
}