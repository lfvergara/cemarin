<?php

if ( ! function_exists( 'stal_core_add_button_variation_textual' ) ) {
	function stal_core_add_button_variation_textual( $variations ) {
		
		$variations['textual'] = esc_html__( 'Textual', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_button_layouts', 'stal_core_add_button_variation_textual' );
}
