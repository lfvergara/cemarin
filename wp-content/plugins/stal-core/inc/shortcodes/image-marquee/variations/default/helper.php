<?php

if ( ! function_exists( 'stal_core_add_image_marquee_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function stal_core_add_image_marquee_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'stal-core' );
		
		return $variations;
	}
	
	add_filter( 'stal_core_filter_image_marquee_layouts', 'stal_core_add_image_marquee_variation_default' );
}
