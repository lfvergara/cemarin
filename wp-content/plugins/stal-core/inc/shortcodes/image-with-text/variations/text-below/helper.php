<?php

if ( ! function_exists( 'stal_core_add_image_with_text_variation_text_below' ) ) {
	function stal_core_add_image_with_text_variation_text_below( $variations ) {
		
		$variations['text-below'] = esc_html__( 'Text Below', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_image_with_text_layouts', 'stal_core_add_image_with_text_variation_text_below' );
}
