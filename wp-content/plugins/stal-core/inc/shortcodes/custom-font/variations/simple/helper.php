<?php

if ( ! function_exists( 'stal_core_add_custom_font_variation_simple' ) ) {
	function stal_core_add_custom_font_variation_simple( $variations ) {
		
		$variations['simple'] = esc_html__( 'Simple', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_custom_font_layouts', 'stal_core_add_custom_font_variation_simple' );
}
