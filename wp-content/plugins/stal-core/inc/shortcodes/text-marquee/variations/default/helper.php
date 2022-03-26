<?php

if ( ! function_exists( 'stal_core_add_text_marquee_variation_default' ) ) {
	function stal_core_add_text_marquee_variation_default( $variations ) {
		
		$variations['default'] = esc_html__( 'Default', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_text_marquee_layouts', 'stal_core_add_text_marquee_variation_default' );
}