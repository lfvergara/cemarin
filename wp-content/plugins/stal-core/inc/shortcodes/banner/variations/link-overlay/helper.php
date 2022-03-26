<?php

if ( ! function_exists( 'stal_core_add_banner_variation_link_overlay' ) ) {
	function stal_core_add_banner_variation_link_overlay( $variations ) {
		
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_banner_layouts', 'stal_core_add_banner_variation_link_overlay' );
}
