<?php

if ( ! function_exists( 'stal_core_add_button_variation_outlined' ) ) {
	function stal_core_add_button_variation_outlined( $variations ) {
		
		$variations['outlined'] = esc_html__( 'Outlined', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_button_layouts', 'stal_core_add_button_variation_outlined' );
}
