<?php

if ( ! function_exists( 'stal_core_add_call_to_action_variation_standard' ) ) {
	function stal_core_add_call_to_action_variation_standard( $variations ) {
		
		$variations['standard'] = esc_html__( 'Standard', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_call_to_action_layouts', 'stal_core_add_call_to_action_variation_standard' );
}
