<?php

if ( ! function_exists( 'stal_core_add_blog_list_variation_simple' ) ) {
	function stal_core_add_blog_list_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_blog_list_layouts', 'stal_core_add_blog_list_variation_simple' );
}