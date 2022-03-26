<?php

if ( ! function_exists( 'stal_core_add_icon_with_text_variation_before_content' ) ) {
	function stal_core_add_icon_with_text_variation_before_content( $variations ) {
		
		$variations['before-content'] = esc_html__( 'Before Content', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_icon_with_text_layouts', 'stal_core_add_icon_with_text_variation_before_content' );
}
