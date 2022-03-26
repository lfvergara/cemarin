<?php

if ( ! function_exists( 'stal_core_add_social_share_variation_text' ) ) {
	function stal_core_add_social_share_variation_text( $variations ) {
		
		$variations['text'] = esc_html__( 'Text', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_social_share_layouts', 'stal_core_add_social_share_variation_text' );
}
