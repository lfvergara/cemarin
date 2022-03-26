<?php

if ( ! function_exists( 'stal_core_add_holder_with_image_variation_right' ) ) {
	function stal_core_add_holder_with_image_variation_right( $variations ) {
		
		$variations['image-right'] = esc_html__( 'Image Right', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_holder_with_image_layouts', 'stal_core_add_holder_with_image_variation_right' );
}
