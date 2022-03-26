<?php

if ( ! function_exists( 'stal_core_add_icon_with_text_variation_before_title' ) ) {
	function stal_core_add_icon_with_text_variation_before_title( $variations ) {
		
		$variations['before-title'] = esc_html__( 'Before Title', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_icon_with_text_layouts', 'stal_core_add_icon_with_text_variation_before_title' );
}
