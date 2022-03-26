<?php

if ( ! function_exists( 'stal_core_add_blog_list_variation_minimal' ) ) {
	function stal_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_blog_list_layouts', 'stal_core_add_blog_list_variation_minimal' );
}