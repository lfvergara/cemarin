<?php
if ( ! function_exists( 'stal_core_filter_clients_list_image_only_fade_in' ) ) {
	function stal_core_filter_clients_list_image_only_fade_in( $variations ) {
		
		$variations['fade-in'] = esc_html__( 'Fade In', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_clients_list_image_only_animation_options', 'stal_core_filter_clients_list_image_only_fade_in' );
}