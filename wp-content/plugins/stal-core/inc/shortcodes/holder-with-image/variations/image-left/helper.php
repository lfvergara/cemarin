<?php

if ( ! function_exists( 'stal_core_add_holder_with_image_variation_left' ) ) {
	function stal_core_add_holder_with_image_variation_left( $variations ) {
		
		$variations['image-left'] = esc_html__( 'Image Left', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_holder_with_image_layouts', 'stal_core_add_holder_with_image_variation_left' );
}
