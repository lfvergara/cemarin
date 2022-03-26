<?php

if ( ! function_exists( 'stal_core_add_blog_list_variation_metro' ) ) {
	function stal_core_add_blog_list_variation_metro( $variations ) {
		$variations['metro'] = esc_html__( 'Metro', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_blog_list_layouts', 'stal_core_add_blog_list_variation_metro' );
}