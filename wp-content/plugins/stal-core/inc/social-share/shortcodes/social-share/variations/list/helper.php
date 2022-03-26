<?php

if ( ! function_exists( 'stal_core_add_social_share_variation_list' ) ) {
	function stal_core_add_social_share_variation_list( $variations ) {
		
		$variations['list'] = esc_html__( 'List', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_social_share_layouts', 'stal_core_add_social_share_variation_list' );
}
