<?php

if ( ! function_exists( 'stal_core_add_social_share_variation_dropdown' ) ) {
	function stal_core_add_social_share_variation_dropdown( $variations ) {
		
		$variations['dropdown'] = esc_html__( 'Dropdown', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_social_share_layouts', 'stal_core_add_social_share_variation_dropdown' );
}
