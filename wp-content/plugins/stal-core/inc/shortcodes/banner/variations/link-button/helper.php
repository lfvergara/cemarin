<?php

if ( ! function_exists( 'stal_core_add_banner_variation_link_button' ) ) {
	function stal_core_add_banner_variation_link_button( $variations ) {
		
		$variations['link-button'] = esc_html__( 'Link Button', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_banner_layouts', 'stal_core_add_banner_variation_link_button' );
}
