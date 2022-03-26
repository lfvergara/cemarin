<?php

if ( ! function_exists( 'stal_core_add_clients_list_variation_image_only' ) ) {
	function stal_core_add_clients_list_variation_image_only( $variations ) {
		
		$variations['image-only'] = esc_html__( 'Image Only', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_clients_list_layouts', 'stal_core_add_clients_list_variation_image_only' );
}