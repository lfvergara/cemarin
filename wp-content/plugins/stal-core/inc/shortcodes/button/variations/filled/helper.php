<?php

if ( ! function_exists( 'stal_core_add_button_variation_filled' ) ) {
	function stal_core_add_button_variation_filled( $variations ) {
		
		$variations['filled'] = esc_html__( 'Filled', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_button_layouts', 'stal_core_add_button_variation_filled' );
}
